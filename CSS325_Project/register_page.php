<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Document</title>
</head>
<body class = "centering">
    <?php include 'nav_bar.php';?>
    <div class="register-container">
        <h1>Create New Account</h1>
        
        <?php if(isset($_GET['inputnull'])){#Input NULL case
                   echo '<div class = "error">
                    <p>Plaese Input all Information before submit !!!</p>
                </div>';
                } ?>
        <?php if(isset($_GET['passwordnotmatch'])){#password not match case
                   echo '<div class = "error">
                    <p>Password and Confirm Password Not Matching !!!</p>
                </div>';
                } ?>
        <?php if(isset($_GET['duplicate'])){#duplicated user case
                   echo '<div class = "error">
                    <p>This Email already taken !!!</p>
                </div>';
                } ?>
        <form action="register_update.php"  method="POST">
            <div class="form-item-container">
                <div class="form-input">
                    <label>E-mail</label>
                    <input type="text" name = "email" require placeholder = "ex. Simple@gmail.com" require>
                </div>
                <div class="form-input">
                    <label>Password</label>
                    <input type="password" name = "password" minlength="6" placeholder = "6-16 Character" require>
                </div>
                <div class="form-input">
                    <label>Confirm Password</label>
                    <input type="password" name = "c_password"  minlength="6" placeholder = "Enter Your password again" require>
                </div>
                <div class="form-item-subgroup">
                    <div class="form-input">
                        <label>First name</label>
                        <input type="text"  name = "fname" placeholder = "Your First Name" require>
                    </div>
                    <div class="form-input">
                        <label>Last Name</label>
                        <input type="text" name = "lname" placeholder = "Your Last Name" require>
                    </div>
                </div>
                <button type = "submit" class ="red-button">Create Account</button>
            </div>
        </form>
    </div>
</body>
</html>