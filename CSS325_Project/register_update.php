<?php

if ($_POST['email'] and $_POST['password'] and $_POST['c_password'] and $_POST['fname'] and $_POST['lname']) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullname = $fname . " " . $lname;



    #Check confirm password is correct
    if (($password != $c_password)) {
        header("location:register_page.php?passwordnotmatch");
    } else {
        require_once('connect.php');
        #Check duplicate email/Fname+Lname in database
        $q = "SELECT * FROM user WHERE email = '$email'";
        $result = $mysqli->query($q);
        $count = $result->num_rows;
        #$password = md5($password); #hashing password 
        if ($count >= 1) { #Return if Value exist in database;
            header("location:register_page.php?duplicate");
        } else { #INSERT INTO user table and redirect to login page 
            $q = "INSERT INTO user (email,password,name) VALUE ('$email','$password','$fullname');";
            $result = $mysqli->query($q);
            header("location:login_page.php?createaccountcomplete");
        }

        $mysqli->close();
    }
} else { #Input is NULL return;
    header("location:register_page.php?inputnull");
}
