
<?php
	include('connect_db.php');
	$id=$_GET['cashier_id'];
	$result = $dbh->prepare("DELETE FROM cashier WHERE cashier_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	echo "<script type='text/javascript'> document.location = 'admin_pharmacist.php'; </script>";
?>
