<?php
session_start();
$host="localhost";
$username="root";
$pass="";
$db="project";

$conn=mysqli_connect('localhost','root','','project');
if(!$conn){
	die("Database connection error");
}


?>
