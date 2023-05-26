<?php

$email = $_POST['email'];
if(isset($_POST['password']) AND isset($_POST['password'])){
    
    $pass = $_POST['password'];
    $c_pass = $_POST['c_password'];
    

    if($pass != $c_pass){
        header('location:resetpass_page.php?passwordnotmacthwithemail='.$email);
    }
    else{
        require_once('connect.php');
        $q = "UPDATE user SET password = '$pass' WHERE email = '$email';";
        if(!$mysqli -> query($q)){
            header('location:forgotpass_page.php?updatepasserror');
        }
        else{
            header('location:forgotpass_page.php?resetcomplete');
        }

    }

}
else{
    header('location:resetpass_page.php?inputerrorwithemail='.$email);
}
