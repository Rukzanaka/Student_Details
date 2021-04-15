<?php
include('Admin_Home.php'); 
?>
<html>
    <head>
        <title>Admin Home</title>
    </head>
    <body>
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title m-b-0">Registration Details</h5>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
    <?php
    include "Connection.php";
    $query="select * from registration ";
    $res=mysqli_query($conn,$query);
 if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    ?>
    <tbody class="customtable">
    <tr>
    <td><?php echo $row['Reg_id'];?></td>
    <td><?php echo $row['Name'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td><?php echo $row['Username'];?></td>
    <!-- <td><a href='Update.php?Get_id=<?php echo $row['Reg_id'];?>'>Add mark</a></td> -->
    <!-- <td><a href="Mark.php">Add mark</a></td> -->
    </tr>
    </tbody>
    <?php
}    

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
