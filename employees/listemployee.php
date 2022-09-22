<?php
include '../general/env.php';
include '../shared/nav1.php';
include '../shared/header.php';
  //Delete
  if (isset($_GET['removeId'])) {
    $id = $_GET['removeId'];
    $delete = "DELETE FROM `employee` WHERE id=$id";
    $deleteCheck = mysqli_query($connection, $delete);
    if ($deleteCheck) {
      header("location: listemployee.php");
    } else {
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }
  }
  
?>
<h1 class="text-center"> list of Employees</h1>
<table class="table table-dark">
          
          
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Name</th>
              
              <th scope="col">Department ID</th>
              <th scope="col">Department Name</th>
              <th scope="col">Salary</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <?php 
              $readAll = "SELECT * FROM `joinemployee`"; 
              $iC = mysqli_query($connection, $readAll);
              ?>
          <tbody>
          <?php foreach($iC as $i){?>  
            <tr>
            <?php
                      $id = $i['empId'];
                      $employeeName = $i['empName'];               
                      $employeedepId = $i['depId'];                      
                      $employeeDepartmentName = $i['depName'];
                      $employeeSalary = $i['salary'];
                      
                    ?>
              <td><?php echo $id ?></td>
              <td><?php echo $employeeName ?></td>
              <td><?php echo $employeedepId ?></td>
              <td><?php echo $employeeDepartmentName ?></td>
              <td><?php echo $employeeSalary ?></td>
              
              <td><button class="btn btn-danger">
            <a href="updateemployee.php?updateId=<?= $id ?>">            
            Edit</a></button>
            <button class="btn btn-danger"><a href="listemployee.php?removeId=<?= $id?>">
            Remove</a></button></td>              
            </tr>
            <?php }?>      
          </tbody>
          
        </table>
        
<?php include '../shared/footer.php'      ?>