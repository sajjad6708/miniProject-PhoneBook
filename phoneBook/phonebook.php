<?php
session_start();

?>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="../css/my.css">
    <title>Document</title>

</head>
<?php include_once "auth.php" ?>

<body>
    <?php
    

    
    if (isset($_GET['logout'])) {
        dologout();
    }

    if (islogin()) {
      
    ?>
    <div class="btn bg-warning"><a href="?logout=1"> خروج </a> </div>
    <div class="btn bg-success"><a href="../index.php" style="color: black;"> صفحه اصلی </a> </div>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="card  bg-info-transparent border-info">
                        <div class="card-header bg-info">
                            مخاطبین
                        </div>


                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#new" role="tab" aria-controls="nav-home" aria-selected="true">مخاطب جدید</a>
                                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#list" role="tab" aria-controls="nav-profile" aria-selected="false">لیست مخاطبین</a>
                                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#search" role="tab" aria-controls="nav-profile" aria-selected="false">جستجو </a>
                                </div>
                            </nav>


                            <div class="tab-content" id="pills-tabContent">
                                <!-- ======================================new user================================== -->
                                <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <form method="POST" action="save.php">

                                        <div class="form-group">
                                            <label><b>نام:</b></label>
                                            <input type="text" class="form-control" name="firstName">
                                        </div>


                                        <div class="form-group">
                                            <label><b>نام خانوادگی:</b></label>
                                            <input type="text" class="form-control" name="lastName">
                                        </div>

                                        <div class="form-group">
                                            <label> <b>شماره تلفن:</b> </label>
                                            <input type="text" class="form-control" name="numbers">
                                        </div>

                                        <div class="form-group">
                                            <label>ایمیل:</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>


                                        <div class="form-group">
                                            <label><b>دسته بندی:</b> </label>
                                            <select name="group" class="form-control">
                                                <option value="friends" selected> دوستان</option>
                                                <option value="famil">فامیل</option>
                                                <option value="work">همکار</option>
                                            </select>
                                        </div> 


                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">ذخیره</button>
                                            <button class="btn btn-danger ml-3" type="reset">ریست</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- =======================================LIST============================ -->
                                <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ردیف</th>
                                                <th scope="col">نام</th>
                                                <th scope="col">نام خانوادگی</th>
                                                <th scope="col">شماره تلفن</th>
                                                <th scope="col">ایمیل</th>
                                                <th scope="col">دسته بندی</th>
                                                <th scope="col">حذف</th>
                                                <th scope="col">ویرایش</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            include_once "../database.php";

                                            $query = "select * FROM persons";
                                            $resualt = $db->query($query);
                                            $count = $resualt->rowCount();
                                            
                                            if($count>=1){
                                                for($i=0;$i<$count;$i++){
                                                    $number = 1;
                                                    $row = $resualt->fetch();

                                                    echo "<tr>";
                                                    echo "<th>" . $number++ . "</th>";
                                                    echo '<td>' . $row['1'] . '</td>';
                                                    echo '<td>' . $row['2'] . '</td>';
                                                    echo '<td>' . $row['3'] . '</td>';
                                                    echo "<td>" . $row['4'] . "</td>";
                                                    echo '<td>' . $row['5'] . '</td>';
                                                    echo "<td><a href='delete.php?id=" . $row['0'] . "'> <div class='btn btn-danger'> حذف</div></a>";
                                                    echo "</td>";
                                                    echo "<td><a href='edit.php?id=" . $row['0'] . "'> <div class='btn bg-success'> ویرایش</div></a>";
                                                    echo "</td>";
                                                    echo "</tr>";

                                                }

                                            }
                                 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- ==================================search=========================== -->
                                <div class="tab-pane fade " id="search" role="tabpanel">
                                    <form method="POST" action="search.php">

                                        <div class="form-group">
                                            <label><b>جستجو</b></label>
                                            <input type="text" class="form-control" name="item">
                                        </div>
                                        <div class="form-group">
                                        <input type="submit" class="btn btn-info" value="search">
                                        </div>
                                    </form>
                                </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    


                                   
    <?php
    

        
    
 } else if (isset($_POST['username']) and isset($_POST['password'])) {
        $result = dologin($_POST['username'], md5($_POST['password']) );

        if ($result==true) {

            header("location:phonebook.php");
            
            
        } else {
            echo "یوزر نیم و پسورد اشتباه است";
            echo "<a href='../index.php'> تلاش دوباره</a>";
        }
    } else {
    ?>

        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-lg-4" style="margin: auto;">
                    <div class="card  bg-info-transparent border-info ">
                        <div class="card-header bg-info">
                            ورود
                        </div>


                        <div class="card-body">
                            

                            <form action="phonebook.php" method="POST">
                                <div class="form-group">
                                    <label> نام کاربری:</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">رمز عبور:</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>


                                <button type="submit" class="btn btn-primary btn-lg btn-block">ورود</button>
                               
                            </form>
                            <a href="../register.php"><button type="button" class="btn btn-primary btn-lg btn-block">ثبت نام</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php


    }
    ?>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../my.js"></script>
</body>

</html>
