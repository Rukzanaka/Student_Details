<?php
include "Connection.php";
include "User_Home.php";
if($_SESSION["Username"] == true){
  
}
else{
    header("location:Login.php");
}
?>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="Login.css">
    </head>
    <body>
    <div class="container">
      <h1>Add Mark</h1>
      <form method="post">
            <div class="text_field">
            <input type="text" id="malayalam" name="malayalam">
            <label>Malayalam:</label>
            </div>
            <div class="text_field">
            <input type="text" id="english" name="english">
            <label>English:</label>
            </div>
            <div class="text_field">
            <input type="type" id="maths" name="maths">
            <label>Maths:</label>
            </div>
            <div class="button">
            <input type="submit" id="click" value="Add" name="btn">
            </div>
        </form>
    </div>
    </body>
    <html>

<?php
$Username =$_SESSION['Username'];
$query="select * from registration where (Username='$Username');";
$res=mysqli_query($conn,$query);
if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);
$Reg_id = $row["Reg_id"];
}

if(isset($_REQUEST['btn'])){
    $Malayalam = $_REQUEST['malayalam'];
    $English = $_REQUEST['english'];
    $Maths = $_REQUEST['maths'];
    $Total = $Malayalam + $Maths +$English;
    $Average =$Total / 3;

    if($Malayalam >100 || $English >100 || $Maths >100  ){
        echo "<script>alert('Total mark of each subject is  is 100')</script>";
     }
    else{
        $sql = "INSERT INTO mark (Malayalam, English, Maths,Total,Average,User_id)
        VALUES ('$Malayalam', '$English', '$Maths','$Total','$Average','$Reg_id') ";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>alert('New record created successfully')</script>";
        
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
    $conn->close();

    


?>
