<?php
if(isset($_GET['ticket_id'])){
    $ticket_id = $_GET['ticket_id'];
    echo $ticket_id;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Document</title>
</head>
<body class = "centering">
    <?php include('nav_bar.php') ?>
    <div class="qr-container">
        <h3>Scan QR to Complete Payment</h3>
        <img src="QR.png">
        <a style="width: 100%;" href="completepayment.php?ticket_id=<?php echo $ticket_id?>"><button style="width: 100%;" class = "red-button" onclick="">Complete</button></a>
    </div>
</body>
</html>