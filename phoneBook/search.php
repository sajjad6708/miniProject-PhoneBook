<?php
include_once "../database.php";
$item = $_POST['item'];


$query = $db->prepare("select * from persons where firstName LIKE :firstName or lastName LIKE :lastName or numbers LIKE :Numbers or email LIKE :email");

$item ="%$item%";
$query->bindParam(":firstName" ,$item , PDO::PARAM_STR);
$query->bindParam(":lastName" ,$item , PDO::PARAM_STR);
$query->bindParam(":Numbers" ,$item , PDO::PARAM_STR);
$query->bindParam(":email" ,$item , PDO::PARAM_STR);

  $result=$query->execute();



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">   
    <link rel="stylesheet" href="../css/my.css">
    <title>Document</title>
</head>

<body>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card  bg-info-transparent border-info">
                    <div class="card-header bg-info">
                        جستجو
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">ردیف</th> -->
                                    <th scope="col">نام</th>
                                    <th scope="col">نام خانوادگی</th>
                                    <th scope="col">شماره تلفن</th>
                                    <th scope="col">ایمیل</th>
                                    <!-- <th scope="col">دسته بندی</th> -->
                                    <!-- <th scope="col">حذف</th> -->
                                    <!-- <th scope="col">ویرایش</th> -->
                                </tr>
                            </thead>
                        
                <?php
                
                if(!$result){
                    echo "<tr><td colspan='4'>error in exe query</td></tr>";
                }else {
                    if($query->rowCount()<1){
                        echo "<tr><td colspan='4'>empty result</td></tr>";
                    }else{
                        while ($row = $query->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['firstName'] . "</td>";
                            echo "<td>" . $row['lastName'] . "</td>";
                            echo "<td>" . $row['numbers'] . "</td>";
                            // echo "<td>" . $row['group'] . "</td>";
                            echo "</tr>";
                        }
                    }

                }
                                    ?>
                                </tbody>
                            </table>
                           
                       
           
            </div>
                </div>
        </div>
</div>

<a href="phonebook.php" class="btn btn-info">return</a>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
   
</body>
</html>