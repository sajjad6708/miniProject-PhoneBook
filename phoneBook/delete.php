<?php
include_once "../database.php";
$id= $_GET['id'];

$query= " DELETE  FROM `persons`  WHERE id= $id ";
$result = $db->query($query);


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
    <br> <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                 <div class="card border-info">
                    <h5 class="card-header bg-info">حذف مخاطب</h5>
                    <div class="card-body">
                     <?php
                     if(!$result){
                         echo " <div class='alert alert-danger'>error in delete contact</div>";
                                 }
                     else{
                        echo " <div class='alert alert-sucsess'>حذف مخاطب با موفقیت انجام شد</div>";

                                 }
                                 ?>
                    </div>
                    <a href="phonebook.php"><div class="btn btn-info m-2">برگشت</div></a>
                </div>
            </div>
        </div>
       
       
    </div>

    
                                 
                                 

                        

    



<script src="../js/jquery-3.5.1.slim.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>
</html>



 