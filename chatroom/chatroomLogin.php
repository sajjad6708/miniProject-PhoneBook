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
    <?php
     include_once "../phoneBook/auth.php";
    ?>
</head>
<body>
    
    <?php
   
        if (isset($_GET['logout'])){
            dologout();
        }

        if (islogin()){

            header("location:chatroom.php");
   
        
        }
        elseif(isset($_POST['username'] ) && isset($_POST['password'])){
                $result  = dologin($_POST['username'], md5($_POST['password']));
               
                if ($result == true) {
                        header("location:chatroomLogin.php");
                    } else {   ?>
                        
                       <div class="alert alert-danger"> نام کاربری یا رمز عبورتو اشتبا زدی عزیزمم</div>
                      <a href="chatroomLogin.php"> <button type="button" class="btn btn-primary" btn-lg btn-block">دوباره تلاش کن</button></a>

                        <?php
                    }}
                else {

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
            
                                        <form action="chatroomLogin.php" method="POST">
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
                                       <a href="../register.php"> <button type="button" class="btn btn-primary btn-lg btn-block">ثبت نام</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                
    ?>
     <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="my.js"></script>

</body>
</html> -->