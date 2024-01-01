<?php
$host="localhost";
$user="root";
$password="";
$db="sample_deped";

$con = mysqli_connect($host,$user,$password,$db);

if(!$con){
  die("Could not conenct to mysql" . mysqli_connect_error());
}
?>