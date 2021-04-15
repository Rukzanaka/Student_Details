<?php
include "Connection.php";
include "User_Home.php";
?>
<?php 
$Username =$_SESSION['Username'];
$query1="select * from registration where (Username='$Username');";
$res=mysqli_query($conn,$query1);
$row1 = mysqli_fetch_array($res);
$id = $row1["Reg_id"];

$query="select * from mark where User_id = '$id'";
$res=mysqli_query($conn,$query);
$rowcount = mysqli_num_rows($res);
?>
<html>
<head>
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<body>
  <div class="main-content">
    <div class="container mt-7">
      <!-- Table -->
      <center><h2 class="mb-5">Result</h2></center><div class="row">

        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Mark List</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Malayalam</th>
                    <th scope="col">English</th>
                    <th scope="col">Maths</th>
                    <th scope="col">Total</th>
                    <th scope="col">Average</th>
                  </tr>
                </thead>

<?php
   for($i=1;$i<=$rowcount;$i++) {
    $row = mysqli_fetch_array($res);
?>
<tbody>
<tr>
<td><?php echo $row["Malayalam"]; ?> </td>
<td><?php echo $row["English"]; ?> </td>
<td><?php echo $row["Maths"]; ?> </td>
<td><b><?php echo $row["Total"]; ?> </b></td>
<td><b><?php echo $row["Average"] ?> </b></td>
</tr>
    </tbody>
<?php
   }
?>
  </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>