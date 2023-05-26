<?php 
if(isset($_POST['email'])){
    $email = $_POST['email'];

    require_once('connect.php');
    $q = "SELECT * FROM user WHERE email = '$email';";
    $result = $mysqli -> query($q);
    $count = $result->num_rows;
    if($count != 1){
        header('location:forgotpass_page.php?usernotfound');
    }
    
}
elseif(isset($_GET['passwordnotmacthwithemail'])){
    $email = $_GET['passwordnotmacthwithemail'];

}
elseif(isset($_GET['inputerrorwithemail'])){
    $email = $_GET['inputerrorwithemail'];
}
else{
    header('location:forgotpass_page.php?inputerror');
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
    <?php include 'nav_bar.php';?>
    <div class="resetpassword-form-container">
        <h1>Enter your new password</h1>
        <?php if(isset($_GET['inputerrorwithemail'])){#input error case
                   echo '<div class = "error">
                    <p>Please Enter your new password !!!</p>
                </div>';
                } ?>
        <?php if(isset($_GET['passwordnotmacthwithemail'])){#password not match case
                   echo '<div class = "error">
                    <p>Your password and Confirm password Not match !!!</p>
                </div>';
                } ?>
        <form action="resetpass_update.php?" method="post">
            <input type="text" name = "email" hidden value="<?php echo $email; ?>">
            <input type="password" minlength="6"  name = "password" placeholder="New password">
            <input type="password" minlength="6"  name = "c_password" placeholder="Confirm password">
            <button class="red-button">Reset Password</button>
        </form>
    </div>
</body>
</html>
