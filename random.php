<?php
//if( isset( $_POST['my_button'] ) )
////    echo 'Нажата кнопка my_button';

    $mysqli = new mysqli("127.0.0.1", "root", "fuckYOU", "movies", 3305);

    $sql = 'SELECT films.name, films.genre, tags.name as tag, films.img FROM films INNER JOIN tags ON films.tag=tags.id  ORDER BY RAND() LIMIT 1';
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '
                    <div class=" col mix f' . $row['tag']  . '" >
                        <div class="card"  >
                            <img src=" ' . $row['img'] .' " class="card-img-top" style="height: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['name']. ' </h5>
                                <p class="genre">' . $row['genre'] . '</p>
                                <div class="tag ' . $row['tag'] . '" title="' . $row['tag'] . '"> </div>
                            </div>
                       </div>
                    </div>
           ';


