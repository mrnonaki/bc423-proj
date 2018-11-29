<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['id']) && isset($_POST['partner_id']) && isset($_POST['orders_track'])) {
	$id = $_POST['id'];
	$partner_id = $_POST['partner_id'];
	$orders_track = $_POST['orders_track'];
	if ($id !== '' && $partner_id !== '' && $orders_track !== '') {
		$date = date("Y-m-d");
		$sql = "UPDATE orders SET partner_id='$partner_id', orders_track='$orders_track', orders_ship='$date', orders_status='2' WHERE orders_id='$id'";
		$result = $conn->query($sql);
		$sql = "UPDATE product SET prod_status='3' WHERE orders_id='$id' AND prod_status='2'";
		$result = $conn->query($sql);
	}
}
$conn->close();
header("Location: ship_rec_1.php");
?>