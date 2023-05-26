<?php
include('nav_bar.php');
if(!isset($_SESSION['user_id'])){
    header('location:login_page.php');
}

?>

<?php 
if(isset($_SESSION['user_id'])){
    require_once('connect.php');
    $user_id = $_SESSION['user_id'];
    $user_q = "SELECT *  FROM user WHERE user_id = $user_id;";
    $user_result = $mysqli -> query($user_q);
    $user_row = $user_result -> fetch_array();

    $ticket_q = "SELECT ticket_id,title,showdate,date_format(Start_time,'%H:%i') AS Start_time,status FROM ticket t 
        INNER JOIN showtime st ON t.show_id = st.show_id 
        INNER JOIN movie m ON st.movie_id = m.movie_id
        WHERE user_id = $user_id ORDER BY showdate DESC,ticket_id ASC;";

    $ticket_result = $mysqli -> query($ticket_q);


    #every time this page is loaded check to update show status first
    $movie_date = "UPDATE showtime SET show_status = 'ended' WHERE DATEDIFF(showdate,NOW()) < 1; ";
    $movie_date_result = $mysqli -> query($movie_date);

    $tick_state = "UPDATE showtime, ticket
        SET showtime.show_id = ticket.show_id, ticket.status = 'ended'   
        WHERE showtime.show_id = ticket.show_id AND DATEDIFF(showtime.showdate,NOW()) < 1;";

    $tick_state_result = $mysqli -> query($tick_state);
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
    <title>Document</title>

    

</head>

<body class="centering">
    <div class="profile-card-container">
        <div class="userprofile-card">
            <h2>User Details</h2>
            <div class="user-profile-detail-container">
                <h3>Email:</h3>
                <input type='text' disabled value="<?= $user_row['email'] ?>">
            </div>
            <div class="user-profile-detail-container">
                <h3>Name:</h3>
                <input type='text' disabled value="<?= $user_row['name'] ?>">
            </div>
            <div class="user-profile-detail-container2">
                <h3 hidden>Membership:</h3>
                <input type='text'hidden disabled value="<?= $user_row['member_plan'] ?>">
                <button class="red-button" hidden>Upgrade</button>
            </div>
        </div>
        <div class="ticket-container">
            <h2>Your Tickets</h2>
            <?php while($ticket_row = $ticket_result -> fetch_array()){ 
                $ticket_id = $ticket_row['ticket_id']?>
            <div class="ticket-card">
                <label>Movie name: <b><?= $ticket_row['title']; ?></b></label>
                <label>Show Date: <b><?= $ticket_row['showdate']; ?></b></label>
                <label>Start Time: <b><?= $ticket_row['Start_time']; ?></b></label>
                <div class="pay-button-container">
                    <form action="ticket_action.php" method="POST">
                        <input type="text" name ="ticket_id" hidden value="<?=$ticket_id?>">
                        <?php if($ticket_row['status'] == "Pay"){
                            echo '<button class = "red-button" style = "margin-right:.4em;" formaction = "ticket_action.php?pay">Pay</button>';
                            
                            echo '<button class = "red-button" formaction = "ticket_action.php?cancel">cancel</button>';
                        } 
                        elseif($ticket_row['status'] == "Show Ticket"){
                            echo '<button class = "red-button" formaction = "ticket_action.php?Show_Ticket">Show Ticket</button>';
                        }else{
                            echo '<button class = "red-button" disabled>Ended</button>';
                        }
                        ?>
                    </form>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</body>

</html>

