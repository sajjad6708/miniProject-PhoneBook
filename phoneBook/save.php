<?php
include "../database.php";

$firstName =$_POST['firstName'];
$lastName = $_POST['lastName'];
$number =$_POST ['numbers'];
$email = $_POST['email'];
$group =$_POST ['group'];

$query = " INSERT INTO `persons` values ('','$firstName', '$lastName', '$number', '$email' ,'$group')";
$result= $db->query($query);
   
?>
<html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">   
    <link rel="stylesheet" href="../css/my.css">
   </head>
   <body>
       <div class="container">
           <br>
           <div class="row">
               <div class="col-12 "> 
                    <div class="card border-info">
                         <h5 class="card-header bg-info">  نتیجه</h5>
                             <div class="card-body">
                                 <?php
                                     if(!$result){
                                         echo "error";}
                                     
                                            else
                                            {
                                                echo "<div class='alert alert-success' role='alert'>
                                                <h4 class='alert-heading'>ذخیره مخاطب با موفقیت انجام شد</h4>
                                                
                                                <hr>
                                                <p class='mb-0'><a class='btn btn-warning' href='phonebook.php' role='button'>بازگشت</a></p>
                                              </div>";
                                            }
                                            ?>
                                         </div>
                                   </div>
                            </div>
                    </div>
             </div>
  
  <script src="../js/jquery-3.5.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.js"></script>
   </body>
   </html>