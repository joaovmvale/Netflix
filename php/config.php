<?php
 
$con = mysqli_connect("localhost:3307", "root", "root", "netflix");
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>