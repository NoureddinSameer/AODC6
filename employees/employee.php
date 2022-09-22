<!-- employee -->
<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav1.php';

if (isset($_POST['send'])) {
  $name = $_POST["empName"];
  $salary = $_POST["empSalary"];
  $phone = $_POST["empPhone"];
  $depId = $_POST["depId"];
  // Image code
  $image_name = time()  . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "./upload/$image_name";

  move_uploaded_file($tmp_name, $location);

  $insert = "INSERT INTO `employee`(id,name,salary,phone,image,departmentid) values(null,'$name',$salary,'$phone' ,'$location',$depId)";
  $insertEmployeeCheck =  mysqli_query($connection, $insert);
  test($insertEmployeeCheck, "insert");
  header("location: listemployee.php");
}


  
?>
<div class="home">
  <h1 class="text-center  pt-5"> Welecome to Employee Page</h1>
</div>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Employee Name</label>
    <input class="form-control" type="text" name="empName">
  </div>
  <div class="form-group">
    <label for="">Employee salary</label>
    <input class="form-control" type="text" name="empSalary">
  </div>
  <div class="form-group">
    <label for="">Employee phone</label>
    <input class="form-control" type="text" name="empPhone">
  </div>
  <div class="form-group">
    <label for="">Employee Profile Photo</label>
    <input class="form-control" type="file" name="image">
  </div>
  <div class="form-group">
    <label for="depId">Employee Department : </label>
    <select class="form-control" type="text" name="depId">
      <?php $selectDep = "SELECT * FROM department";
            $departments = mysqli_query($connection,  $selectDep);

           foreach ($departments as $data) { ?>
            <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
      <?php  } ?>
    </select>
  </div>
  <button name="send" class="btn btn-info"> Send </button>
</form>


<?php include '../shared/footer.php' ?>