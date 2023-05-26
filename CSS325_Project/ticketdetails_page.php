<?php 
include('nav_bar.php');
if(isset($_GET['showdetail']) AND isset($_POST['selected_id'])){
    $show_id = $_POST['selected_id'];
    $tikcet_number =  $_POST['tikcet_number'];
    $user_id = $_SESSION['user_id'];

    require_once('connect.php');

    $q = "SELECT title,date_format(Start_time,'%H:%i') AS Start_time,showdate,avaliable_seat FROM showtime st
        INNER JOIN movie m ON st.movie_id = m.movie_id WHERE show_id = '$show_id';";
    $q_result = $mysqli -> query($q);

    $q_row = $q_result ->fetch_array();

    if((($q_row['avaliable_seat'] - $tikcet_number) >= 0)){
        $update_seat = ($q_row['avaliable_seat'] - $tikcet_number);
        $update_seat_q = "UPDATE showtime
            SET avaliable_seat = $update_seat WHERE show_id = $show_id;";
        
    }else{
        header('Location: ' . $_SERVER["HTTP_REFERER"]."&avseat=".$q_row['avaliable_seat'] );
    }

    
}else{
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
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
<body class = "centering">
    <div class = "ticket-detail-card">
        <form action="confirmticket_update.php" method="post">
            <input class = "hidden-input"type="text" name ="show_id" hidden value="<?=$show_id?>">
            <div class="ticket-details-container">
                <label>Movie Name</label>
                <input type="text" name = "title" readonly value = "<?=$q_row['title']?>">
            </div>
            <div class="ticket-details-container">
                <label>Date</label>
                <input type="text" name = "showdate" readonly value = "<?=$q_row['showdate']?>">
            </div><div class="ticket-details-container">
                <label>Time</label>
                <input type="text" name = "Start_time" readonly value = "<?=$q_row['Start_time']?>">
            </div>
            <div class="ticket-details-container">
                <label>Number of ticket</label>
                <input type="text"  name = "ticket_num" readonly value = "<?=$tikcet_number?>">
            </div>
            <button type = "submit" class = "red-button" >Confirm</button>
            <button class = "red-button"formaction ="home_page.php">Cancel</button>
    </div>

    </form>
</body>
</html>