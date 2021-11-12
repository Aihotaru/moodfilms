<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MoodFilms</title>
    <link rel="icon" type="image/png" href="app/img/favicon.png" sizes="32x32">
    <link rel="stylesheet" href="app/css/main.css">
    <link rel="stylesheet" href="app/css/@font-face.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js" type="text/javascript"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <?php

    $mysqli = new mysqli("127.0.0.1", "root", "fuckYOU", "movies", 3305);

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $sql = 'SELECT films.name, films.genre, tags.name as tag, films.img, films.id FROM films INNER JOIN tags ON films.tag=tags.id';
    $result = mysqli_query($mysqli, $sql);

    ?>
    <nav class="navbar navbar-light bg-ligh">
        <div class="container-fluid justify-content">
            <div>
                <button class="btn btn-outline-info mr-2 show" type="button" title="Filter" data-toggle="modal" data-target="#filters">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>

                <button class="btn btn-outline-info mr-2 " type="submit" name="my_button" title="Random" data-toggle="modal" data-target="#random" id="icon_events_header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dice-3" viewBox="0 0 16 16">
                        <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>
                        <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                </button>

                <button class="btn btn-outline-info mr-2 " id="search" type="button" title="Search" value="Click" onmousedown="viewDiv()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
                <button class="btn btn-outline-info mr-2 " id="" type="button" title="Add" data-toggle="modal" data-target="#adding">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </button>
                <div id="div1">
                    <form id="searchForm" role="form">
                         <input type="text" name="search" id="search_content">
                         <button class="btn btn-outline-info mr-2 show" type="submit" name="submit" id="search_handler" data-toggle="modal" data-target="#search_result"></button>
                    </form>
                </div>


            </div>
            <div class="">
                <a href="index.php">
                    <img src="app/img/logo.png" class="logo">
                </a>
            </div>
        </div>
        <!-- Modal for filters -->
        <div class="modal fade" id="filters" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" data-filter=".fchristmas" class="filter">
                        <img src="app/img/christmas-tree.png">
                    </button>
                    <button type="button" data-filter=".flove" class="filter">
                        <img src="app/img/love.png">
                    </button>
                    <button type="button" data-filter=".fsport" class="filter">
                        <img src="app/img/dumbbell.png">
                    </button>
                    <button type="button" data-filter=".fself-education" class="filter">
                        <img src="app/img/graduation-cap.png">
                    </button>
                    <button type="button" data-filter=".ftears" class="filter">
                        <img src="app/img/tear.png">
                    </button>
                    <button type="button" data-filter=".fmiracle" class="filter">
                        <img src="app/img/magic-wand.png">
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal for random -->
        <div class="modal fade" id="random" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"><div id="content-php"></div></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Modal for search -->
    <div class="modal fade" id="search_result" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="search-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for adding -->
    <div class="modal fade" id="adding" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adding movie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_form" role="form" enctype="multipart/form-data">
                        <label for="add_title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="add_title" name="add-title">
                        <label for="add_genre" class="col-form-label">Genre:</label>
                        <input type="text" class="form-control" id="add_genre"  name="add-genre">
                        <label for="add_tag" class="col-form-label">Tag:</label>
                        <select class="form-select" aria-label="Default select example" name="add-tag">
                            <option selected disabled>Open this select menu</option>
                            <option value="1">christmas</option>
                            <option value="2">self-education</option>
                            <option value="3">sport</option>
                            <option value="4">miracle</option>
                            <option value="5">tears</option>
                            <option value="6">love</option>
                        </select>
                        <label for="add_image" class="form-label">Image:</label>
                        <input class="form-control" type="file" id="add_image"  name="add-image">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <div class="container" >
        <div class="row " id="Container">
            <div class="backNav hidding">
                <button class="btn btn-outline-info mr-2 hide">
                    <a href="index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
                        </svg>
                    </a>
                </button>
            </div>
            <?php


            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <div class=" col mix f' . $row['tag']  . '" >
                        <div class="card" style="height: 35rem;">
                            <img src=" ' . $row['img'] .' " class="card-img-top" style="height: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['name']. ' </h5>
                                <p class="genre">' . $row['genre'] . '</p>
                                <div class="tag ' . $row['tag'] . '" title="' . $row['tag'] . '"> </div>
                            </div>
                            <button class="del_but" id="del_action" type="button"  name="' . $row['id'] . '" index="' . $row['id'] . '">Удалить</button>
                       </div>
                    </div>
           ';
            }
            ?>

        </div>



    </div>

    <script>
        $(function(){
            $('#Container').mixItUp();
        });
    </script>
    <script>
        $("#icon_events_header").click(function(){
            $("#content-php").load("random.php");
        });
    </script>
    <script>
        function viewDiv(){
            document.getElementById("div1").style.display = "block";
        }
    </script>
     <script>
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
    </script>
    <script>
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
    </script>
    <script>

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


    </script>
    <script src="app/js/jquery.mixitup.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"type="text/javascript"></script>
    <script src="app/js/back.js" type="text/javascript"></script>
</body>
</html>