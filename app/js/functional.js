//Filter button
$(function(){
    $('#Container').mixItUp();
});

//Back button
$(".show").on("click", function(){
    $(".row>.backNav").removeClass("hidding");
});
$(".hide").on("click", function(){
    $(".row>.backNav").addClass("hidding");
});

//Search button

function viewDiv(){
    document.getElementById("div1").style.display = "block";
}

$(document).ready(function(){
    $("#searchForm").submit(function(event){
        submitForm();
        return false;
    });
});
function submitForm(){
    $.ajax({
        type: "POST",
        url: "search.php",
        cache:false,
        data: $('form#searchForm').serialize(),
        success: function(response){
            $("#search-content").html(response);
        },
        error: function(){
            alert("Error");
        }
    });
}

//Add button
$(document).ready(function(){
    $("#add_form").submit(function(event){
        submitFormAdd();
        return false;
    });
});
function submitFormAdd(){
    var form = $("#add_form")[0];
    var formdata = new FormData(form);
    $.ajax({
        type:'POST',
        //method:'post',
        url: "add.php",
        cache:false,
        data: formdata,
        processData: false,
        contentType: false,
        success: function(){
            window.location.reload();
        }
    });
}

//Delete button

$(document).ready(function()
{
    $(".del_but").click(function()
    {
        var deleteIndex = $(this).attr('index');
        var datadel = $( "#del_action" ).serialize();

        $.ajax
        ({
            type: "POST",
            url: "delete.php",
            data: datadel + '&deletion=' + deleteIndex,
            cache: false,
            success: function(html)
            {
                location.reload();
            }
        });

    });
});

// Random button

$("#icon_events_header").click(function(){
    $("#content-php").load("random.php");
});
