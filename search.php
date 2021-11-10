<?php
$search_value = $_POST["search"];
$con = new mysqli("127.0.0.1", "root", "fuckYOU", "movies", 3305);
if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
}else{
    $sql="SELECT films.name, films.genre, tags.name as tag, films.img FROM films INNER JOIN tags ON films.tag=tags.id  WHERE films.name LIKE '%$search_value%'";

    $res=$con->query($sql);

    while($row=$res->fetch_assoc()){
        echo  '<div class=" col mix f' . $row['tag']  . '" >
                        <div class="card" style="height: 35rem;">
                            <img src=" ' . $row['img'] .' " class="card-img-top" style="height: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['name']. ' </h5>
                                <p class="genre">' . $row['genre'] . '</p>
                                <div class="tag ' . $row['tag'] . '" title="' . $row['tag'] . '"> </div>
                            </div>
                       </div>
                    </div>
        ';
    }

}