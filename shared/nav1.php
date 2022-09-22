<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: ../index.php");
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Company System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['admin'])) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Sign in <span class="sr-only">(current)</span></a>
                
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Employees
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../employees/listemployee.php">List All</a>
                    <a class="dropdown-item" href="../employees/employee.php">Create New</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Department
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../listdepartment.php">List All</a>
                    <a class="dropdown-item" href="../createdepartment.php">Create New</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    admin
                </a>
                <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" href="./listdepartment.php">List All</a> -->
                    <a class="dropdown-item" href="../admin/create.php">Create admin</a>

                </div>

            </li>



            <?php endif; ?>
        </ul>
        <?php if (isset($_SESSION['admin'])) : ?>
        <form action="">
            <button name="logout" class="btn btn-danger"> Logout </button>
        </form>
        <?php else : ?>
        <a href="index.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">login</a>
        <?php endif; ?>
    </div>
</nav>