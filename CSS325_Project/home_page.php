<?php 
require_once('connect.php');

$q = "SELECT * FROM movie LIMIT 5";
$result = $mysqli -> query($q);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="slider.css">
    <title>Document</title>
</head>

<body class="homepage">
    <?php include 'nav_bar.php';?>
    <div class="slideshow">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <a>
                        <h1>Now Showing...</h1>
                    </a>
                    <img src="material/poster/movie1.jpg">
                </div>
                <div class="swiper-slide">
                    <a>
                        <h1>Now Showing...</h1>
                    </a>
                    <img src="material/poster/movie2.jpg">
                </div>
                <div class="swiper-slide">
                    <a>
                        <h1>Now Showing...</h1>
                    </a>
                    <img src="material/poster/movie3.jpg">
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
    <div class="movie-list-container">
        <a><h1>MOVIES.....</h1></a>

        <div class="movie-card-container">
            <?php 
                while($row = $result -> fetch_array()){ ?>
                    
                    <div class="movie-card">
                <div class="movie-img">
                    <img src="material/<?=$row['title']?>.jpg">
                </div>
                <div class = "movie-detail-card">
                    <div class="movie-detail-container">
                        <div class="detail-container">
                            <a id = "title"><span><?=$row['title']?></span></a>  
                            <a>Rate: <?=$row['rate']?></a>  
                            <div class="genre-detail">
                                <div class="genre-detail-1">
                                    <?php 
                                        $genre = $row['genre'];
                                        $genre_arr = explode (",", $genre);
                                        foreach($genre_arr as $genre_value){?>
                                            <a><?=$genre_value?></a>
                                        <?php }
                                    ?>
                                </div>
                            </div>  
                                <a>Time: <?=($row['duration'])?></a>
                        </div>
                        <a href = "buyticket_page.php?movie_id=<?=$row['movie_id']?>" style="align-self: center;"><button class = "red-button">GET TICKET</button></a>  
                    </div>
                </div>
                </div>
            <?php }
            ?>
            <button class = "red-button morebutton">MORE</button>
            
            
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src = "img_slider_config.js"></script>
</body>

</html>