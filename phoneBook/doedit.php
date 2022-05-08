<?php
if (isset($_POST['sub'])){
   include_once ("../database.php");

$firstName =$_POST['firstName'];
$lastName = $_POST['lastName'];
$numbers =$_POST ['numbers'];
$email = $_POST['email'];
$code =$_POST ['h'];

$query = $db->prepare("UPDATE persons set id=:code , firstName=:firstName , lastName =:lastName ,
numbers=:numbers , email=:email where id=$code  ");
$query->bindParam(":code" , $code , PDO::PARAM_INT);
$query->bindParam(":firstName" , $firstName , PDO::PARAM_STR);
$query->bindParam(":lastName" , $lastName , PDO::PARAM_STR);
$query->bindParam(":numbers" , $numbers , PDO::PARAM_STR);
$query->bindParam(":email" , $email , PDO::PARAM_STR);

$result = $query->execute();
}


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
                    <h5 class="card-header bg-info">ویرایش مخاطب</h5>
                    <div class="card-body">
                     <?php
                     if(!$result){
                         echo " <div class='alert alert-danger'>error in delete contact</div>";
                                 }
                     else{
                        echo " <div class='alert alert-sucsess'>ویرایش مخاطب با موفقیت انجام شد</div>";

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
<?php
  
   



