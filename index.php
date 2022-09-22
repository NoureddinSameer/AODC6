<!-- index -->
<?php
include './general/env.php';
include './general/functions.php';
include './shared/header.php';
include './shared/nav2.php';
if (isset($_POST['login'])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $newpassword = sha1($password);
    $select = "SELECT * FROM admins where name ='$name' and password = '$password'";
    $s  = mysqli_query($connection, $select);
    $numRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    if ($numRows == 1) {
        
        $_SESSION['admin'] = [
            'adminName' => $name,
            'role'=>$row['role'],
        ];
        
        
    } else {
        session_unset();
        session_destroy();
        header("location: index.php");
        echo "<div class='alert alert-danger' role='alert'>
      Error! <br>
      The data is not stored in the database
      because You have a problem communicating with the Database
      <br>OR You have entered Wrong Data </div>";
    }
}
// print_r($_SESSION);
  
?>
    <div class="home">
    <h1 class="text-center  pt-5">sign in</h1>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Admin Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="password">Admin Password</label>
        <input type="text" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" name="login" class="btn btn-primary">Log in</button>
    </form>
  
</table>
<?php include './shared/footer.php' ?>

        
    