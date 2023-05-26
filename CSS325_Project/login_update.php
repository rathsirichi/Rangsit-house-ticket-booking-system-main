<?php 
if(isset($_POST['email']) AND isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once('connect.php');
    $q = "SELECT * FROM user WHERE email = '$email' AND password = '$password';"; 
    $result = $mysqli-> query($q);
    
    if($result->num_rows >= 1){
        $row = $result -> fetch_array();
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        header("location:userprofile_page.php");
        exit();
    }
    else{
        header("location:login_page.php?usernotfound");
        exit();
    }

}
else{
    header("location:login_page.php");
    exit();
}
?>