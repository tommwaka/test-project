<?php
include_once 'connect_db';
if(isset($_POST['SUBMIT'])){
    $username =$_POST['username'];
    $password=$_POST['password'];
    $position=$_POST['position'];
switch($position){
    case 'Admin':
        $result= mysql_query("SELECT admin_id , username from admin where username='$username' and password='$password'");
        $row=mysql_fetch_array($result);
        if($row>0){
        session_start();
        $_SESSION['admin_id']=$row[0];
        $_SESSION['username']=$row[1];
        header("location:admin.php");
        }else{
         echo "Invalid Login Try Again";
        }
        break;
        case 'pharmacist';
        $result=mysql_query("SELECT pharmacist_id , first_name , last_name ,staff_id , username FROM pharmacist WHERE username='$username' AND password='$password'");
        $row=mysql_fetch_array($result);
        if($row>0){
            session_start();
            $_SESSION['pharmacist_id']=$row[0];
            $_SESSION['first_name']=$row[1];
            $_SESSION['last_name']=$row[2];
            $_SESSION['staff_id']=$row[3];
            $_SESSION['username']=$row[4];
            header("location:pharmacist.php");
        }else{
            $message="Invalid Login Try Again";
        }
        break;
        case 'Cashier':
        $result=mysql_query("SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'");
        $row=mysql_fetch_array($result);
        if($row>0){
        session_start();
        $_SESSION['cashier_id']=$row[0];
        $_SESSION['first_name']=$row[1];
        $_SESSION['last_name']=$row[2];
        $_SESSION['staff_id']=$row[3];
        $_SESSION['username']=$row[4];
        header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
        }else{
        $message="<font color=red>Invalid login Try Again</font>";
        }
        break;
        case 'Manager':
        $result=mysql_query("SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
        $row=mysql_fetch_array($result);
        if($row>0){
        session_start();
        $_SESSION['manager_id']=$row[0];
        $_SESSION['first_name']=$row[1];
        $_SESSION['last_name']=$row[2];
        $_SESSION['staff_id']=$row[3];
        $_SESSION['username']=$row[4];
        header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
        }else{
        $message="<font color=red>Invalid login Try Again</font>";
        }
        break;
}




}




?>