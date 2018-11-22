<?php
//Open a new connection to the MySQL server
$con = mysqli_connect("localhost","root","root","todolist");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}