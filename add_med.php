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
	$sname=$_POST['drug_name'];
	$cat=$_POST['category'];
	$des=$_POST['description'];
	$com=$_POST['company'];
	$sup=$_POST['supplier'];
	$qua=$_POST['quantity'];
	$cost=$_POST['cost'];
	$sta="Available";
    $exp=$_POST['exp_date'];
	
	$sql=mysql_query("INSERT into stock(drug_name,category,description,company,supplier,quantity,cost,status,date_supplied,exp_date)
	VALUES('$sname','$cat','$des','$com','$sup','$qua','$cost','$sta',NOW(),'$exp')");
	if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock_pharm.php");
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
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script type="text/javascript" SRC="js/superfish/superfish.js"></script>
	<script type="text/javascript" SRC="js/superfish/supersubs.js"></script>
     <link rel="stylesheet" href="datepicker.css">
  <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
  
  <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>   
    $(function() {
         $( "#datepicker" ).datepicker();   
    }); 
</script>
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
                                <a href="add_new_pres.php"><i class="fa fa-user-md fa-fw"></i> Add new</a>
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
                        <a href="#">Add Medicine</a>
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
		
		
               
          
<div id="row" align="center">

<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">New Medicine</h1>
                </div>
                <!--End Page Header -->
            </div>
<div class="row" align="left">
			 <form name="myform" onsubmit="return validateForm(this);"  method="post" action="add_med.php">
      
        <div class="form-row" align="left">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Drug Name:</label>
            <input type="text"  id="drug_name" class="form-control" name="drug_name">
          </div>
        </div>
		
        <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="category">Category:</label>
              <input type="text" id="category" class="form-control" name="category">
            </div>
          </div>
        
		
        <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Description">Description:</label>
              <input type="text" id="description" class="form-control" name="description">
            </div>
          </div>
		 
		 
        <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="company">Company:</label>
              <input type="text" id="company" class="form-control" name="company">
            </div>
          </div>
		  <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="supplier">Supplier:</label>
              <input type="text" id="supplier" class="form-control" name="supplier">
            </div>
          </div>
                
                  <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="quantity">Quantity:</label>
              <input type="int" class="form-control" name="quantity" id="quantity">
            </div>
          </div>
        
		  
		 
		  <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="cost">Cost:</label>
              <input type="int" id="cost" class="form-control" name="cost">
            </div>
          </div>
		
       
                 
                  <div class="form-row" align="left">
          <div class="col-md-4"></div>
		  <div class="form-group col-md-4"> <!-- Date input -->
        <label  for="date">Expiring Date:</label>
        <input class="form-control" id="exp_date" name="exp_date" placeholder="MM/DD/YYY" type="date">
      </div>
                 </div>
		  
        <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <button type="reset" value="reset" name="reset" class="btn btn-success" style="margin-left:38px">Cancel</button>
         
            <button type="submit" value="submit" name="submit" class="btn btn-success" style="margin-left:38px">Add Medicine</button>
          </div>
        </div>
                 
      </form>
	  
	  </div>
			
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
         
		 
	 <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
                
                 <script src="datepicker.min.js"></script> 
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
		 
		 