<?php
if(isset($_POST['ticket_id'])){
    $ticket_id = $_POST['ticket_id'];
    echo $ticket_id;
    
}

if(isset($_GET['cancel'])){
    require_once('connect.php');
    $drop_q = "DELETE FROM ticket WHERE ticket_id= $ticket_id";
    $drop_result = $mysqli -> query($drop_q);
    header('location:userprofile_page.php');
    
}
else{
    if(isset($_GET['pay'])){

        header('location:payment_page.php?ticket_id='.$ticket_id);
    }
    elseif(isset($_GET['Show_Ticket'])){
        header('location:Showticket_page.php?ticket_id='.$ticket_id);
    }
    
}
?>