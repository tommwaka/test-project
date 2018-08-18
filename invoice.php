<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
    $c_id=$_POST['customer_id'];
$cname=$_POST['customer_name'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$drug=$_POST['drug_name'];
$strenth=$_POST['strength'];
$dos=$_POST['dose'];
$quantity=$_POST['quantity'];


		
    $sql=mysql_query("INSERT INTO tempprescri(customer_id,customer_name,age,sex,postal_address,phone,drug_name,strength,dose,quantity)
				VALUES('$c_id','$cname','$age','$sex','$postal','$phone','$drug','$strenth','$dos','$quantity')");
    if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/view_prescription.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
}
?>