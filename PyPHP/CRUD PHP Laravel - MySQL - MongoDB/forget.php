<?php
session_start();
require_once("config.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username =  $_POST['username'];
    $email = $_POST['email'];

    $cek = mysqli_query($koneksi, "Select * from user where username = '$username' AND email='$email'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($cek)!=0){
    $sql = mysqli_query($koneksi, "Select password from user where username = '$username' AND email='$email'") or die(mysqli_error($koneksi));
        
    if($sql){
            $row= mysqli_fetch_assoc($sql);
            $pw = $row['password'];
            echo '<script>alert("Your password is '.$pw.'."); document.location="index.php";</script>';
        }else{
            echo '<div class= "alert alert-warning">Forgot password failed.</div>';
        }
    }else {
        echo '<div class= "alert alert-warning">Please input the correct username.</div>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <section>
        <div class="box">
            <div class="form">
                <h2>Forgot Password</h2>
                <form action="" method="POST">
                    <div class="inputBx">
                        <input type="text" name="username" id="" placeholder="Username" required>
                        <img src="style/user.png" alt="">
                    </div>
                    <div class="inputBx">
                        <input type="email" name="email" id="" placeholder="E-mail Address" required>
                        <img src="style/mail.png" alt="">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Submit">
                    </div>
                </form>
                <p class="forget">Already have an account ? <a href="index.php">Login here</a></p>      
            </div>
        </div>
    </section>
</body>
</html>