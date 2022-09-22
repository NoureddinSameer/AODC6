<!-- updateemployee -->
<?php
include '../general/env.php';
include '../shared/header.php';
include '../shared/nav1.php';

$id = $_GET['updateId'];
$selectOneRow = "SELECT * FROM `joinemployee` WHERE empId=$id";
$Check = mysqli_query($connection, $selectOneRow);
// i represent the row
if($Check){    
$i = mysqli_fetch_assoc($Check);

$employeeName = $i['empName'];
$employeeEmail = $i['email'];
$employeePassword = $i['password'];
$employeeDepartmentid = $i['depId'];
$employeeDepartmentName = $i['depName'];
$employeeSalary = $i['salary'];
}
//update after we press on button of Update Data
if (isset($_POST['update'])) {
    $employeeName = $_POST['employeeName'];
    $employeeEmail = $_POST['employeeEmail'];
    $employeePassword = $_POST['employeePassword'];
    $employeeDepartmentid = $_POST['employeeDepartmentid'];
    $employeeSalary = $_POST['employeeSalary'];
    
    $update = "UPDATE `employee` SET  name='$employeeName',email='$employeeEmail',`password`='$employeePassword',
    departmentid=$employeeDepartmentid,salary=$employeeSalary WHERE id=$id";
    $CheckUpdate = mysqli_query($connection, $update);
    
    if ($CheckUpdate) {
        header("location: listemployee.php");
    } else {
        die("ERROR!" . mysqli_connect_error());
    }
}

?>
<form method="POST">
    <div class="form-group">
        <label for="employeeName">Employee Name</label>
        <input type="text" class="form-control" value=<?= $employeeName ?> id="employeeName" name="employeeName" required>
    </div>
    <div class="form-group">
        <label for="employeeEmail">Employee Email</label>
        <input type="text" class="form-control" value=<?= $employeeEmail ?> id="employeeEmail" name="employeeEmail" required>
    </div>
    <div class="form-group">
        <label for="employeePassword">Employee password</label>
        <input type="text" class="form-control" value=<?= $employeePassword ?> id="employeePassword" name="employeePassword" required>
    </div>
    <div class="form-group">
        <label for="employeeDepartmentid">Department Name</label>
        <select  id="employeeDepartmentid" name="employeeDepartmentid" required>
        <?php
        
      $readAll = "SELECT * FROM `department`"; 
      $iC = mysqli_query($connection, $readAll);
      ?>
  
  <option value=<?= $employeeDepartmentid ?>> <?= $employeeDepartmentName ?></option>              
  <?php foreach($iC as $i){
              $ide = $i['id'];
              $departmentName = $i['name'];
              
              if($employeeDepartmentName != $departmentName){ ?>
              <option value=<?= $ide ?>> <?= $departmentName ?></option>              
    <?php } }?>             
    </select>
    </div>
    <div class="form-group">
        <label for="employeeSalary">Salary</label>
        <input type="text" class="form-control" value=<?= $employeeSalary ?> id="employeeSalary" name="employeeSalary" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
    </form>
    
    </table>
        <button class="btn btn-danger"><a href="employee.php
                    ">Go Employee</a></button></td>
                  
            
<?php include '../shared/footer.php' ?>