<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmcare sys</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="style/table.css">

    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<script src="js/function.js" type="text/javascript"></script>
<script type="text/javascript" SRC="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" SRC="js/superfish/hoverIntent.js"></script>
	<script type="text/javascript" SRC="js/superfish/superfish.js"></script>
	<script type="text/javascript" SRC="js/superfish/supersubs.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("ul.sf-menu").supersubs({
				minWidth:    12,
				maxWidth:    27,
				extraWidth:  1

			}).superfish();

		});
	</script>
		<script>
function validateForm() {
    var value = document.myform.customer_name.value;
	if(value.match(/^[a-zA-Z]+(\s{1}[a-zA-Z]+)*$/)) {
        return true;
    } else {
        alert('Name Cannot contain numbers');
        return false;
    }
}
</script>
	<script SRC="js/cufon-yui.js" type="text/javascript"></script>
	<script SRC="js/Liberation_Sans_font.js" type="text/javascript"></script>
	<script SRC="js/jquery.pngFix.pack.js"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,h6');
		Cufon.replace('.logo', { color: '-linear-gradient(0.5=#FFF, 0.7=#DDD)' });
	</script>
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">
                    <img src="assets/img/" alt="" />
                    <div><strong><b><h2><i>Pharmcare Sys</i><h2></b></strong></div>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <?php  session_start();
							if(!empty($_SESSION["username"])) {
						   echo "Hello, {$_SESSION["username"]}";
							}
							else{
							  echo "You're not logged in!!";
							}
								?>

                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li >
                        <a href="pharmacist.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Prescription<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="view_prescription"><i class="fa fa-edit fa-fw"></i> View Prescription</a>

                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user-md fa-fw"></i> Add new</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-medkit fa-fw"></i> Stock<span class="fa arrow"></span></a>
                        <ul class= "nav nav-second-level">
                        <li>
                        <a href="stock_pharm.php">View stock</a>
                        </li>
                        <li>
                        <a href="add_med.php">Add Medicine</a>
                        </li>

                         </ul>
                                     </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-users fa-fw"></i> About Us</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i>Reports</a>
                    </li>



                </ul>
                <!-- end side-menu -->

            </div>
            <!-- end sidebar-collapse -->


		 <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="navbar">
		 <div class="footer" align="Center"> life is good</div></nav>

		 </nav>

		 	 <div id="page-wrapper">




<div class="row" align="center">

<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"> New Prescription</h1>
                </div>
                <!--End Page Header -->
            </div>

			<div class="row" align="left">
			 <form name="myform" onsubmit="return validateForm(this);"  method="post" action="add_new_pres.php">

        <div class="form-row" align="left">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="id">Customer ID:</label>
            <input type="int"  id="customer_id" class="form-control" name="customer_id">
          </div>
        </div>

        <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="name">Name:</label>
              <input type="text" id="customer_name" class="form-control" name="customer_name">
            </div>
          </div>


        <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="age">Age:</label>
              <input type="int" id="age" class="form-control" name="age">
            </div>
          </div>

		  <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="gender">Gender:</label>
        <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sex" id="sex" value="option1">
  <label class="form-check-label" for="inlineRadio1">male</label>
      </div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sex" id="sex" value="option2">
  <label class="form-check-label" for="inlineRadio2">female</label>
</div>
</div>
          </div>
        <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="postal address">Postal Address:</label>
              <input type="text" id="postal_address" class="form-control" name="postal_address">
            </div>
          </div>
		  <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="phone">Phone:</label>
              <input type="int" id="phone" class="form-control" name="phone">
            </div>
          </div>

		   <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
			 <label for="phone">Drug:</label>
		 <select  type="text" class="form-control" id="drug_name" name="drug_name">
		 <option>select drug </option>
		 <option>Actal </option>
        <option>Aspirin </option>
		 </select>
		</div>
          </div>

		  <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="strength">Strength:</label>
              <input type="text" class="form-control" name="strength" id="strength">
            </div>
          </div>
		  <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="dose">Dose:</label>
              <input type="text" id="dose" class="form-control" name="dose">
            </div>
          </div>
		  <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="quantity">Quantity:</label>
              <input type="int" id="quantity" class="form-control" name="quantity">
            </div>
          </div>


        <div class="row" align="left">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" value="submit" name="submit" class="btn btn-success" style="margin-left:38px">Add Prescription</button>
          </div>
        </div>
      </form>

	  </div>

		 </div>





        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->


	 <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>
</body>
</html>
