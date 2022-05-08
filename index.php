<?php
 session_start();
 ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/my.css">

    <title>sajjaddashtban</title>

</head>
<?php
function dologout(){
    unset($_SESSION['login'] , $_SESSION['displayName'] ,$_SESSION['username']);

}
if (isset($_GET['logout'])){
    dologout();
}
?>

<body">
    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card text-center  " id="card1">
                    <div class="card-header ;">
                       <p><b> بسم الله الرحمن الرحیم</b></p>
                       <p id="pth">مینی پروژه طراحی سایت با php </p>
                    </div>

                    <div class="card-body" id="page1">

                    <a href="phoneBook/phonebook.php"><button type="button" class="btn btn-info b1">دفتر تلفن</button></a>
                    <a href="chatroom/chatroomLogin.php"><button type="button" class="btn btn-dark b1">چت آنلاین</button></a>
 
                    </div>
                    <div class="card-footer text-muted bg-primary">
                    <p style="float: right;"><b style="color:black; font-size:25px">سجاد دشتبان  وزیر</b></p>
                    <a style="float: left;" href="?logout=1"><div class='btn btn-danger'> خروج از حساب کاربری</div></a>
                    
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