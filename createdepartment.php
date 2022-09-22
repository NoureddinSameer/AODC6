<!-- index -->
<?php
include './general/env.php';
include './shared/nav2.php';
include './general/functions.php';

//Insert
if (isset($_POST['insert'])){
    $departmentName = $_POST['departmentName'];

    $insert = "INSERT INTO `department` VALUES(null,'$departmentName')";
    $insertCheck = mysqli_query($connection, $insert);
    test($insertCheck,"insertion");
    if($insertCheck){      
      echo "<div class='alert alert-success' role='alert'>
      The data has been stored 
      in the database successfully</div>";
    }else {
      echo "<div class='alert alert-danger' role='alert'>
      Error!
      The data is not stored in the database
      because You have a problem communicating with the Database
      Or You Entered a Department Name That was entered before </div>";
    }
    // path('employee.php');
  }

  //Delete
if (isset($_GET['removeId'])) {
    $id = $_GET['removeId'];
    $delete = "DELETE FROM `department` WHERE id=$id";
    $deleteCheck = mysqli_query($connection, $delete);
    if ($deleteCheck){
      header("location: createdepartment.php");
    }else{
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }
  }
  include './shared/header.php';
?>
    <div class="home">
    <h1 class="text-center  pt-5"> Welcome to Department Page</h1>
    </div>

    <form method="POST">
    <div class="form-group">
        <label for="departmentName">Department Name</label>
        <input type="text" class="form-control" id="departmentName" name="departmentName" required>
    </div>
    <button type="submit" name="insert" class="btn btn-primary">Insert Department</button>
    </form>
    
    <!-- Read  -->

        <table class="table table-dark">
          
          
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php 
      $readAll = "SELECT * FROM `department`"; 
      $iC = mysqli_query($connection, $readAll);
      ?>
  <tbody>
  <?php foreach($iC as $i){?>  
    <tr>
    <?php
              $id = $i['id'];
              $departmentName = $i['name'];
            ?>
      <td><?php echo $id ?></td>
      <td><?php echo $departmentName ?></td>
    
      <td><button class="btn btn-primary">
            <a href="update.php?updateId=<?= $id ?>"            
            class="text-light btn-a">Edit</a></button>
            <button class="btn btn-danger"><a href="createdepartment.php?removeId=<?= $id ?>"
            class="text-light btn-a">Remove</a></button></td>

            
    </tr>
    <?php }?>      
  </tbody>
  
</table>

<?php include './shared/footer.php'      ?>

        
    