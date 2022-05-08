<?php

$username =$_POST['username'];
$password = $_POST['password'];


include "database.php";

$query = "INSERT INTO `members` (`id`, `username`, `password`) VALUES (NULL, '$username', MD5('$password')); ";

$result = $db->query($query);

if ($result){
  
    header("location:index.php");
    
}
else
{
   echo" error";
}



