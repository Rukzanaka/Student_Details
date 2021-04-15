<?php
session_start();
?>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="Login.css">
    </head>
    <body>
    <div class="container">
      <h1>Registration</h1>
      <form method="post">
            <div class="text_field">
            <input type="type" id="name" name="name">
            <label>Name:</label>
            </div>
            <div class="text_field">
            <input type="email" id="email" name="email">
            <label>Email:</label>
            </div>
            <div class="text_field">
            <input type="type" id="username" name="username">
            <label>Username:</label>
            </div>
            <div class="text_field">
            <input type="password" id="password" name="password">
            <label>Password</label>
            </div>
            <div class="text_field">
            <input type="password" id="password" name="conform_password">
            <label>Conform Password</label>
            </div>
            <div class="button">
            <input type="submit" id="click" value="Sign Up" name="btn">
            </div>
            <div class="text_field">
            <a href="Login.php">Login here</a>
            </div>
        </form>
    </div>
    </body>
    <html>
<?php
include 'Connection.php';

if(isset($_POST['btn'])){
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $Conform_Password = $_POST['conform_password'];

if(empty($Name) || empty($Email) || empty($Username) || empty($Password) || empty($Conform_Password) ){
        echo "<script>alert('please fill all field')</script>";
}
    elseif($Password != $Conform_Password){
        echo "<script>alert('Password Mismatch Please Enter Correct')</script>";
    }
    elseif(strlen($Email)<7){  // min
        echo "<script>alert('Pasword atleast 7 character')</script>";
    }
else{
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $Conform_Password = $_POST['conform_password'];

$query="select * from registration where (Username='$Username' and Password='$Password');";
      $res=mysqli_query($conn,$query);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

     if($Username==$row['Username'] && $Password==$row['Password'])
     {
        echo "<script>alert('already exist')</script>";
    } 
        }
        else{

$sql = "INSERT INTO registration (Name, Email,Username, Password,Conform_Password)
VALUES ('$Name', '$Email', '$Username','$Password','$Conform_Password')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('New record created successfully')</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
}
$conn->close();
?>


