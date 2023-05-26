<?php
    $header_default = "<h1>Please enter your Registered email <br> To Reset your password</h1>";
    $input_defalut = "<input type='text'name = 'email' placeholder='E-mail'>";
    $submit_button_default = "<button class = 'red-button'>Reset Password</button>";
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
<body class = "centering">
    <?php include 'nav_bar.php';?>
    <div class="input-container">
        <?php if(isset($_GET['resetcomplete'])){# Reset pass complete
                $header_default = "<h1>Reset password complete</h1>";
                $input_defalut = "<a style = 'align-self:center;'><img src = 'check.png' width = '80em' height = '80em'></a>";
                $submit_button_default = "<a href='login_page.php' style = 'align-self:center;'><button class = 'red-button' type = 'button'>LOG-IN</button></a>";
                } ?>
        <?php echo $header_default ?>
        <?php if(isset($_GET['usernotfound'])){#user not found case
                   echo '<div class = "error">
                    <p>User not found please check your email !!!</p>
                </div>';
                } ?>
        <?php if(isset($_GET['inputerror'])){#input error case
                   echo '<div class = "error">
                    <p>Please enter your Email !!!</p>
                </div>';
                } ?>
        <?php if(isset($_GET['updatepasserror'])){# Reset pass error
                   echo '<div class = "error">
                    <p>Cannot Reset your password Try again !!!</p>
                </div>';
                } ?>
        
        <form action="resetpass_page.php" method="post">
            <div class="form-item-container">
                <?php echo $input_defalut;?>
                <?php echo $submit_button_default;?>
            </div>
            
        </form>
    </div>
</body>
</html>