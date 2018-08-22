
<?php
session_start();
error_reporting(0);
include_once ('connect_db.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
if(isset($_POST['submit'])){
    
    $sname=$_POST['drug_name'];
	$cat=$_POST['category'];
	$des=$_POST['description'];
	$com=$_POST['company'];
	$sup=$_POST['supplier'];
	$qua=$_POST['quantity'];
	$cost=$_POST['cost'];
    //$sta='status';
    $edate=$_POST['exp_date'];
    
    $sql1="INSERT INTO stock(drug_name,category,description,company,supplier,quantity,cost,exp_date)
    VALUES(:sname,:cat,:des,:com,:sup,:qua,:cost,:edate)";
    $query= $dbh -> prepare($sql1);
    $query-> bindParam(':sname', $sname, PDO::PARAM_STR);
    $query-> bindParam(':cat', $cat, PDO::PARAM_STR);
    $query-> bindParam(':des', $des, PDO::PARAM_STR);
    $query-> bindParam(':com', $com, PDO::PARAM_STR);
    $query-> bindParam(':sup', $sup, PDO::PARAM_STR);
    $query-> bindParam(':qua', $qua, PDO::PARAM_STR);
    $query-> bindParam(':cost', $cost, PDO::PARAM_STR);
    //$query-> bindParam(':sta', $sta, PDO::PARAM_STR);
    $query-> bindParam(':edate', $edate, PDO::PARAM_STR);
    $query-> execute();
    $lastInsertId = $dbh->lastInsertId();
if($lastInsertId){
    if($query->rowCount() > 0)
{
echo "<script type='text/javascript'> document.location = 'admin_stock.php'; </script>";
}
}

	}}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmcare sys</title>
    <!-- Core CSS - Include with every page -->
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style/table.css" type="text/css" media="screen" />
    <script src="js/function.js" type="text/javascript"></script>
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <script src="js/function.js" type="text/javascript"></script>
   

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
							if(!empty($_SESSION["alogin"])) {
						   echo htmlentities ($_SESSION['alogin']);
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
                  
                    <li class="selected">
                        <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Staff<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href=""><i class="fa fa-edit fa-fw"></i> View Staff<span class="fa arrow"></a>
                                <ul class="nav nav-third-level">

                            <li>
                                <a href="admin_pharmacist.php">Pharmacist</a>
                            </li>
                            <li>
                                <a href="admin_manager.php">Manager</a>
                            </li>
                            <li>
                                <a href="admin_cashier.php">Cashier</a>
                            </li>
                           </ul>
                            </li>

                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-medkit fa-fw"></i> Drugs<span class="fa arrow"></span></a>
                        <ul class= "nav nav-second-level">
                          <li>
                          <a href="admin_stock.php">View Drugs</a>
                          </li>
                          <li>
                          <a href="admin_add_med.php">Add Drugs</a>
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
        </nav>
        <!-- end navbar side -->
        <div id="page-wrapper">

<div class="grid-form">
     <!-- Page Header -->
     <div class="col-lg-12">
         <h1 class="page-header">New Medicine</h1>
     </div>
     <!--End Page Header -->
 </div>

<div class="tab-content">
             <div class="tab-pane active" id="horizontal-form">

<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
 <div class="container-fluid">
    

   <div class="form-group">
	<label for="focusedinput" class="col-sm-2 control-label">Drug name:</label>
		<div class="col-sm-8">
            <input type="text"  id="drug_name" class="form-control" name="drug_name">
          </div>
        </div>

        <div class="form-group">
	<label for="focusedinput" class="col-sm-2 control-label">Category:</label>
		<div class="col-sm-8">
              <input type="text" id="category" class="form-control" name="category">
            </div>
          </div>


        <div class="form-group">
	<label for="focusedinput" class="col-sm-2 control-label">Description:</label>
		<div class="col-sm-8">
              <input type="text" id="description" class="form-control" name="description">
            </div>
          </div>


         <div class="form-group">
	<label for="focusedinput" class="col-sm-2 control-label">Company:</label>
		<div class="col-sm-8">
              <input type="text" id="company" class="form-control" name="company">
            </div>
          </div>

          <div class="form-group">
	<label for="focusedinput" class="col-sm-2 control-label">Supplier:</label>
		<div class="col-sm-8">
              <input type="text" id="supplier" class="form-control" name="supplier">
            </div>
          </div>

               <div class="form-group">
	<label for="focusedinput" class="col-sm-2 control-label">Quantity:</label>
		<div class="col-sm-8">
              <input type="number" class="form-control" name="quantity" id="quantity">
            </div>
          </div>

		   <div class="form-group">
	<label for="focusedinput" class="col-sm-2 control-label">Cost:</label>
		<div class="col-sm-8">
              <input type="number" id="cost" class="form-control" name="cost">
            </div>
          </div>

                 <div class="form-group">
	<label for="focusedinput" class="col-sm-2 control-label">Expiry Date:</label>
		<div class="col-sm-8">
        <input class="form-control" id="exp_date" name="exp_date" placeholder="MM/DD/YYY" type="date">
      </div>
                 </div>

                                  
                                  <div class="form-row" align="left">
                                    <div class="col-md-4"></div>
                                      <div class="form-group col-md-4">
                                      
    <button type="reset" value="reset" name="reset" class="btn btn-primary" style="margin-left:38px">Cancel</button>

                                      <button type="submit" value="submit" name="submit" class="btn btn-success" style="margin-left:38px">Submit</button>
                                    </div>
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
                              


