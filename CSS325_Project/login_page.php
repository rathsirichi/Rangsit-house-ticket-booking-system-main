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
    <div class = "login-card-container">
        <form action="login_update.php" method="post">
            <div class = "login-card">
                <h2>LOG-IN</h2>
                <?php if(isset($_GET['usernotfound'])){#duplicated user case
                   echo '<div class = "error">
                    <p>Incorrect Email or Password try again!!!</p>
                </div>';
                } ?>
            <div class="input_group-container">
            <div class="input-group">
                    <input required="" type="text" name="email" autocomplete="off" class="input">
                    <label class="user-label">E-mail</label>
                </div>
                <div class="input-group">
                    <input required="" type="password" name="password" autocomplete="off" class="input">
                    <label class="user-label">PASSWORD</label>
                </div>
            </div>
            <button class = "red-button">Login</button>
        </form>
            <div class = "forgotpass">
                <a href = "forgotpass_page.php"><p>Forgot Password</p></a>
                <a href = "register_page.php"><p>Create Account</p></a>
            </div>
        </div>
    </div>
</body>
</html>