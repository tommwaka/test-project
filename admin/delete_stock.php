
<?php
	include('connect_db.php');
	$id=$_GET['stock_id'];
	$result = $dbh->prepare("DELETE FROM stock WHERE stock_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	echo "<script type='text/javascript'> document.location = 'admin_stock.php'; </script>";
?>
