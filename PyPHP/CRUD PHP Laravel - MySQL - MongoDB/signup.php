<?php
session_start();
    require_once("config.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $username =  $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

    $cek = mysqli_query($koneksi, "Select * from user where username = '$username'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($cek)==0){
        $sql = mysqli_query($koneksi, "insert into user (username, password, email) values ('$username', '$password', '$email')");
        if($sql){
            echo '<script>alert("Success sign up."); document.location="index.php";</script>';
        }else{
            echo '<div class= "alert alert-warning">Failed to add data.</div>';
        }
    }else {
        echo '<div class= "alert alert-warning">Username is already in use.</div>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <section>
        <div class="box">
            <div class="form">
                <h2>Sign up</h2>
                <form action="" method="POST">
                    <div class="inputBx">
                        <input type="text" name="username" id="" placeholder="Username" required>
                        <img src="style/user.png" alt="">
                    </div>
                    <div class="inputBx">
                        <input type="email" name="email" id="" placeholder="E-mail address" required> 
                        <img src="style/mail.png" alt="">
                    </div> 
                    <div class="inputBx">
                        <input type="password" name="password" id="" placeholder="Password" required>
                        <img src="style/lock.png" alt="">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Sign up">
                    </div>
                </form>
                <p class="forget">Already Have an account ? <a href="index.php">Login</a></p> 
            </div>
        </div>
    </section>
</body>
</html>