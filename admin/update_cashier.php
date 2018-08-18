
<?php
  session_start();
  include('connect_db.php');
  if(isset($_SESSION['username'])){
  $id=$_SESSION['admin_id'];
  $user=$_SESSION['username'];
  }else{
  header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
  exit();
  }
   if(isset($_GET['username'])){
	$user=$_GET['username'];
	$result = mysql_query("SELECT * FROM cashier where username='$user'");
		while($row = mysql_fetch_array($result))
			{
        $fname=$row['first_name'];
        $lname=$row['last_name'];
        $sid=$row['staff_id'];
        $postal=$row['postal_address'];
        $phone=$row['phone'];
        $email=$row['email'];
        $username=$row['username'];
        $pas=$row['password'];
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
    <script>
    function validateForm()
    {

    //for alphabet characters only
    var str=document.myform.first_name.value;
    	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	//comparing user input with the characters one by one
    	for(i=0;i<str.length;i++)
    	{
    	//charAt(i) returns the position of character at specific index(i)
    	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
    	if(valid.indexOf(str.charAt(i))==-1)
    	{
    	alert("First Name Cannot Contain Numerical Values");
    	document.myform.first_name.value="";
    	document.myform.first_name.focus();
    	return false;
    	}}

    if(document.myform.first_name.value=="")
    {
    alert("Name Field is Empty");
    return false;
    }

    //for alphabet characters only
    var str=document.myform.last_name.value;
    	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	//comparing user input with the characters one by one
    	for(i=0;i<str.length;i++)
    	{
    	//charAt(i) returns the position of character at specific index(i)
    	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
    	if(valid.indexOf(str.charAt(i))==-1)
    	{
    	alert("Last Name Cannot Contain Numerical Values");
    	document.myform.last_name.value="";
    	document.myform.last_name.focus();
    	return false;
    	}}


    if(document.myform.last_name.value=="")
    {
    alert("Name Field is Empty");
    return false;
    }

    }

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
                        <a href="#">View Drugs</a>
                        </li>
                        <li>
                        <a href="#">Add Drugs</a>
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

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Update Cashier</h1>
                </div>
                <!--End Page Header -->
            </div>

<div class="row" align="left">
  <form name="myform" onsubmit="return validateForm(this);"  method="post" action="cash.php">

  <div class="form-row" align="left">
      <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="name">Firstname:</label>
          <input type="text" id="first_name"  class="form-control" name="first_name" value="<?php echo $fname ?>">
        </div>
      </div>

      <div class="form-row" align="left">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="name">Lastname:</label>
              <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo $lname ?>">
            </div>
          </div>

          <div class="form-row" align="left">
              <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                  <label for="staffid">Staff ID:</label>
                  <input type="text" id="staff_id" placeholder="staffid" class="form-control" name="staff_id" value="<?php echo $sid ?>">
                </div>
              </div>

              <div class="form-row" align="left">
                  <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                      <label for="address">Postal Address:</label>
                      <input type="text" id="postal_address" class="form-control" name="postal_address" value="<?php echo $postal ?>">
                    </div>
                  </div>

                  <div class="form-row" align="left">
                      <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                          <label for="phone">Phone:</label>
                          <input type="text" id="phone" class="form-control" name="phone" value="<?php echo $phone ?>">
                        </div>
                      </div>

                      <div class="form-row" align="left">
                          <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                              <label for="email">Email:</label>
                              <input type="email" id="email" class="form-control" name="email" value="<?php echo $email ?>">
                            </div>
                          </div>

                          <div class="form-row" align="left">
                              <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                  <label for="username">Username:</label>
                                  <input type="text" id="username" class="form-control" name="username" value="<?php echo $username ?>">
                                </div>
                              </div>

                              <div class="form-row" align="left">
                                  <div class="col-md-4"></div>
                                    <div class="form-group col-md-4">
                                      <label for="password">Password:</label>
                                      <input type="password" id="password" class="form-control" name="password" value="<?php echo $pas ?>">
                                    </div>
                                  </div>
                                  <div class="form-row" align="left">
                                    <div class="col-md-4"></div>
                                      <div class="form-group col-md-4">
                                      <button type="reset" value="reset" name="reset" class="btn btn-success" style="margin-left:38px">Cancel</button>

                                      <button type="submit" value="update" name="update" class="btn btn-success" style="margin-left:38px">Update</button>
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
