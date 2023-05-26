<?php 
if(isset($_GET['ticket_id'])){
    $ticket_id = $_GET['ticket_id'];
    require_once('connect.php');
    $q = "UPDATE ticket SET status = 'Show Ticket' WHERE ticket_id = $ticket_id;";
    $q_result = $mysqli -> query($q);
    header('location:userprofile_page.php');
}
else{
    header('location:userprofile_page.php');
}
?>