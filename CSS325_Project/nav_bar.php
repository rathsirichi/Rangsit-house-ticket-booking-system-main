<?php
session_start();
if(isset($_SESSION['user_id'])){
    $loginbutton = "<a href='logout_script.php' class = 'blank-eff'><button class = 'red-button'>LOG-OUT</button></a>";
}
else{
    $loginbutton = "<a href='login_page.php' class = 'blank-eff'><button class = 'red-button'>Sign-in/Sign-up</button></a>";
}
?>

<div class = "nav-bar">
        <a><img src="logo.png" alt="logo" height="50"></a>
        <div class = "nav-bar-element">
            <a href="home_page.php">Home</a>
            <a href="userprofile_page.php">Profile</a>
            <?php echo $loginbutton; ?>
        </div>
    </div>