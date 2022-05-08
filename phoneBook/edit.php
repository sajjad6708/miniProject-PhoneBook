<?php

include_once "../database.php";
$item = $_GET['id'];
   

    $query = $db->prepare("select * from persons where id=:id");
    $query->bindParam(":id", $item, PDO::PARAM_STR);

    $result = $query->execute();

    $row = $query->rowCount();

?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="../css/my.css">
    <title>edit</title>
</head>

<body>
   <?php
   if($row>=1){
       for ($i=0; $i<$row ; $i++){
           $r = $query->fetch();
           ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card  bg-info-transparent border-info">
                        <div class="card-body">
                            <form method="POST" action="doedit.php" >
    
                                <div class="form-group">
                                    <label><b>نام:</b></label>
                                    <input type="text" class="form-control" name="firstName" value="<?php echo $r['1']?>">
                                </div>
    
    
                                <div class="form-group">
                                    <label><b>نام خانوادگی:</b></label>
                                    <input type="text" class="form-control" name="lastName" value="<?php echo $r['2']?>">
                                </div>
    
                                <div class="form-group">
                                    <label> <b>شماره تلفن:</b> </label>
                                    <input type="text" class="form-control" name="numbers" value="<?php echo $r['3']?>">
                                </div>
    
                                <div class="form-group">
                                    <label>ایمیل:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $r['4']?>">
                                </div>
                                <div class="form-group">
                                   
                                    <input type="hidden" class="form-control" name="h" value="<?php echo $r['0']?>">
                                </div>
    

                                <div class="form-group">
                                   <input type="submit" value="اعمال" name="sub">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script src="../js/jquery-3.5.1.slim.min.js"></script>
                <script src="../js/popper.min.js"></script>
                <script src="../js/bootstrap.js"></script>
                </body>
                </html>
        <?php 
            
       }
       

  

   }


 
// include_once "database.php";
// if (isset( $_POST['sub'] )){
    
    
//     $query = "UPDATE `persons` SET `id`='$code' , `firstName`='$firstName' , `lastNme`='$lastName' , `numbers`='$number' , `email`='$email'  WHERE .id`=$code ";
//     $result = $db->query($query);

// if (!$query){
//     echo " error in edit";
// }

// }
   