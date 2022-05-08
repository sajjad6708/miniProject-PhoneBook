<?php
$db= new PDO("mysql:host=localhost;dbname=cms","root","");

if($db->errorCode()){
    die('could not connect'. $db->errorInfo());

}