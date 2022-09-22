<?php
function test($connection,$message){
    if($connection){
        echo "<div class='alert alert-success' role='alert'>
        $message is done
        
      </div>";
        
    }else{
        echo "<div class='alert alert-danger' role='alert'>
        Error! <br> Something went wrong
        </div>";
    }
}
function path($go)
{
    echo "<script>
    location.replace('./$go')
    </script>";
}
function auth()
{

    if (!$_SESSION['admin']) {
        path("index.php");
    }
}
?>