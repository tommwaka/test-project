
<?php
	include('connect_db.php');
	$id=$_GET['manager_id'];
	$result = $dbh->prepare("DELETE FROM manager WHERE manager_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	echo "<script type='text/javascript'> document.location = 'admin_pharmacist.php'; </script>";
?>

