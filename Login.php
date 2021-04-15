<?php 
session_start();
?>
<html>
<head>
<title>login</title>
<link rel="stylesheet" href="Login.css">
</head>
<body>
<div class="container">
      <h1>Login</h1>
      <form method="post">
            <div class="text_field">
            <input type="type" id="name" name="username">
            <label>UserName:</label>
            </div>
            <div class="text_field">
            <input type="password" id="password" name="password">
            <label>Password</label>
            </div>
            <div class="button">
            <input type="submit" id="click" value="Sign In" name="btn">
            </div>
            <div class="text_field">
            <a href="Registration.php">Register here</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include 'Connection.php';

if(isset($_REQUEST['btn'])){
    $Username = $_REQUEST['username'];
    $Password =$_REQUEST['password'];
    
    if($Username =='Admin' && $Password == 'admin'){
        $_SESSION["Username"] = $Username;
        header("location:Admin_Home.php");
    }
    else{

    $query="select * from registration where (Username='$Username' and Password='$Password');";
      $res=mysqli_query($conn,$query);
   if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION["Username"] = $Username;
    header("location:User_Home.php"); 
        }
    }
}

?>
