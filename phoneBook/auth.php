<?php

function dologout(){
    unset($_SESSION['login'] , $_SESSION['displayName'] ,$_SESSION['username']);
    header("location:../index.php");

}

 function islogin(){
     if(isset($_SESSION['login']) and $_SESSION['login']==1){
         return true;
     }
     else
     {
       return false;
     }

 }

 function dologin($u,$p){
     $db = new PDO("mysql:host=localhost;dbname=cms" , "root" , "");
     $query = $db->prepare("SELECT * from members where username =:u and password=:p ");
     $query->bindParam(":u", $u, PDO::PARAM_STR);
     $query->bindParam(":p", $p, PDO::PARAM_STR);

     $result=$query->execute();
     $result = $query->rowCount();

    if($result>=1){
        $row= $query->fetch();
        $_SESSION['login'] = 1;
             $_SESSION['username'] = $row['username'];
    
            return true;
    }         
else
{
    return false;

}

    //  }
    //  else
    //  {
    //     $row = $query->fetch();

    //     if (md5($p) == $row['password'] )
    //  {
    //    
    //  }
    //  else
    //  {
    //      return false;
    //  }
    //  }

     
     


 }

