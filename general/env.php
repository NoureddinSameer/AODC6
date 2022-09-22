<?php
$connection=mysqli_connect("localhost","root","","aodc6");
if (!$connection) {
    die("ERROR: 
    You have a problem communicating with the database" . mysqli_connect_error());
}