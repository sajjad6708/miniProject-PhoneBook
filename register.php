
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="css/my.css">
    <script lang="javascript">
        
    </script>
    <title>ثبت نام</title>
</head>
<body>
<div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-lg-4" style="margin: auto;">
                    <div class="card  bg-info-transparent border-info ">
                        <div class="card-header bg-info">
                            ثبت نام
                        </div>


                        <div class="card-body">
                            

                            <form action="doregister.php" method="POST">
                                <div class="form-group" class="text_form">
                                    <label> نام کاربری:</label>
                                    <input type="text" name="username" class="form-control" id="name">
                                    <span id="result"> </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">رمز عبور:</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                             
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> تکراررمز عبور:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>


                                <button type="submit" class="btn btn-primary  btn-block">ثبت نام</button>
                            </form>
                            <a href="index.php"><button class="btn btn-bg-danger btn-block">برگشت به صفحه اصلی </button></a>

                        </div>
                    </div>
                </div>
            </div>
</div>





    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="my.js"></script>
</body>
</html>

