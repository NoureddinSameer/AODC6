<!-- update -->
<?php
include './general/env.php'; 

//Get the id 
$id = $_GET['updateId'];
$selectOneRow = "SELECT * FROM `department` WHERE id=$id";
$Check = mysqli_query($connection, $selectOneRow);
// i represent the row

if($Check){
    $i = mysqli_fetch_assoc($Check);
    $departmentName = $i['name'];
}
//update after we press on button of Update Data
if (isset($_POST['update'])) {
    $departmentName = $_POST['departmentName'];
    
    $update = "UPDATE `department` SET name='$departmentName' WHERE id=$id";
    $CheckUpdate = mysqli_query($connection, $update);
    
    if ($CheckUpdate) {
        header("location: createdepartment.php");
    } else {
        die("ERROR!" . mysqli_connect_error());
    }
}
include './shared/header.php';
include './shared/nav2.php';
?>
<form method="POST">
    <div class="form-group">
        <label for="departmentName">Department Name</label>
        <input type="text" class="form-control" value=<?= $departmentName; ?> id="departmentName" name="departmentName" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
    </form>
    
<?php include './shared/footer.php'      ?>