<?php
$con = mysqli_connect("localhost","root","","railreserve");
if (mysqli_connect_errno()){
    echo "<script>alert('cannot connect to the database');</script>";
    exit();
}
?>