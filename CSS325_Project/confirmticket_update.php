<?php 
session_start();?>

<?php
if(isset($_POST['show_id'])){
    
    $ticket_num = $_POST['ticket_num'];
    $user_id = $_SESSION['user_id'];
    $show_id = $_POST['show_id'];
    require_once('connect.php');

    $create_ticket = "INSERT INTO `ticket` (`ticket_id`, `show_id`, `user_id`, `status`) VALUES (NULL, '$show_id', '$user_id', 'Pay');";
    $create_ticket_q = $mysqli -> query($create_ticket);

    $seat_update = "UPDATE showtime SET avaliable_seat = avaliable_seat-$ticket_num WHERE show_id = $show_id;";
    $seat_update_q = $mysqli -> query($seat_update);

    header('location:userprofile_page.php');


}

else{
    header('location:home_page.php');
}




