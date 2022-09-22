<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav1.php';

if (isset($_POST['insert'])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    // $newpassword = sha1($password);
    $insert = "INSERT INTO admins value(null , '$name' , '$password' ,$role)";
    $Check = mysqli_query($connection, $insert);
    test($Check, "insert Admin");
    session_unset();
        session_destroy();
        
    header("location: ../index.php");
}
// if ($_SESSION['admin']['role'] != 0) {
//     path('404.php');
// }
?>
<h1 class="text-center">Add admin</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Admin Name </label>
        <input class="form-control" type="text" name="name">
    </div>
    <div class="form-group">
        <label for="">Admin Password </label>
        <input class="form-control" type="password" name="password">
    </div>
    <div class="form-group">
        <label for="">Admin Role </label>
        <select name="role" id="" class="form-control">
            <option value="0">All Access</option>
            <option value="1">Semi Access</option>
        </select>
    </div>
    <button name="insert" class="btn btn-info"> Add Admin </button>

</form>