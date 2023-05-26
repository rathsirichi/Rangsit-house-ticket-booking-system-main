<?php

if(isset($_GET['movie_id']) AND isset($_POST['select_date'])){
    
    $movie_id = $_GET['movie_id'];
    $select_date = $_POST['select_date'];
    require_once('connect.php');

    
    $movie_date = "SELECT movie_id, show_id ,date_format(Start_time,'%H:%i') AS Start_time,avaliable_seat  FROM showtime WHERE movie_id = '$movie_id' AND showdate = '$select_date'";
    #$movie_result = $mysqli->query($movie_date);
    #$movie_result_row = $movie_result -> fetch_array();
    
    #echo $movie_result_row['show_id'];
    header("location:buyticket_page.php?q=".$movie_date."&movie_id=".$movie_id);
 
    
    
    
}



?>