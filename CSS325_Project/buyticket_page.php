<?php
include('nav_bar.php');
if(!isset($_SESSION['user_id'])){
    header('location:login_page.php');
}?>




<?php
if (isset($_GET['movie_id'])) {
    $movie_id = $_GET['movie_id'];
    require_once('connect.php');
    $movie = "SELECT * FROM movie WHERE movie_id = $movie_id";
    $movie_result = $mysqli->query($movie);
    $movie_row = $movie_result->fetch_array();
} else {
}


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
    <title>Document</title>
</head>

<body class="centering">
    
    <div class="selected-movie-container">
        <div class="movie-header-container">
            <div class="selected-movie-detail-container">
                <a id="img-container"><img src="material/<?= $movie_row['title'] ?>.jpg" width="250px" height="330px"></a>
                <div class="selected-movie-detail">
                    <a id="description">
                        <p><?php echo $movie_row['description']; ?></p>
                    </a>
                    <a>RATE: <?php echo $movie_row['rate']; ?></a>
                    <a>TIME: <?php echo $movie_row['duration']; ?></a>
                    <div class="genre-detail-1">
                        <?php
                        $genre = $movie_row['genre'];
                        $genre_arr = explode(",", $genre);
                        foreach ($genre_arr as $genre_value) { ?>
                            <a><?= $genre_value ?></a>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="timeselect">
                    <div class="select-time-form">
                        <form action="searchticket_update.php?movie_id=<?= $movie_id; ?>" method="post">
                            <input type='date' name="select_date" require>
                            <button class="red-button">Search Show</button>
                        </form>
                    </div>
                    <div class="selected-time-show">
                        <?php
                        require_once('connect.php');
                        if (isset($_GET['q'])) {
                            $q = $_GET['q'];
                            $result = $mysqli->query($q);
                            ?>
                            <form class = "ticket-form" action="ticketdetails_page.php" method="post"><?php
                            $count = $result -> num_rows;
                            if($count <= 0){
                                echo "<label style = 'color:WHITE;font-weight:bold;'>Search results not found.</label>";
                            }
							while ($row = $result->fetch_array()) { ?>
                                <?php $movie_id = $row['movie_id']; 
                                $show_id = $row['show_id'];
                                $seat_remain = $row['avaliable_seat'];
                                if($seat_remain != 0){?>
                                    <div class="time-wrapper">
                                        <input type="radio" name="selected_id" value="<?=$show_id?>">
                                        <label>
                                            <span><?=$row['Start_time']?></span>
                                        </label>
                                    </div>                                    

                                <?php }?>
                                <?php }
                                if(isset($show_id) AND $show_id != NULL){
                                    echo '<label style = "color:WHITE;font-weight:bold;">number of Ticket:</label>
                                            <select name="tikcet_number" class = "select_ticketnum">
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                            </select>';
                                    echo '<button class="red-button" formaction = "ticketdetails_page.php?showdetail">BUY TICKET</button>';
                                     
                                }
                                ?>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>