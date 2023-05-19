<?php
session_start();
if(isset($_SESSION['Login'])){
    header("Location: display.php");
    exit();
}
require_once("config.php");

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // $sql = mysql_query("select * from user where username='$username' AND password = '$password'", $koneksi);
    $sql = mysqli_query($koneksi, "select * from user where username = '$username' and password = '$password'") or die (mysqli_error());
   
    if(mysqli_num_rows($sql) != 0){
        $_SESSION['Login'] = 1;
        session_start();
        header("Location:display.php");
        exit();
    } else{
        header("Location:loginerror.php");
        exit();
    }

}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <section>
        <div class="box">
            <div class="form">
                <h2>Login</h2>
                <form action="" method="post">
                    <div class="inputBx">
                        <input type="text" name="username" id="" placeholder="Username" required>
                        <img src="style/user.png" alt="">
                    </div>
                    <div class="inputBx">
                        <input type="password" name="password" id="" placeholder="Password" required>
                        <img src="style/lock.png" alt="">
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>
                <p class="forget">Forgot Password ? <a href="forget.php">Click here</a></p>
                <p class="forget">Don't Have an account ? <a href="signup.php">Sign up</a></p> 
            </div>
        </div>
    </section>
</body>
</html>