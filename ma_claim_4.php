<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['id']) && isset($_POST['prod_sn']) && isset($_POST['new_sn']) && isset($_POST['claim_reason'])) {
	$id = $_POST['id'];
	$date = date("Y-m-d");
	$old = $_POST['prod_sn'];
	$new = $_POST['new_sn'];
	$reason = $_POST['claim_reason'];
	$sql = "INSERT INTO claim VALUES (NULL, '$date', '$old', '$new', '$reason')";
	$result = $conn->query($sql);
	$sql = "UPDATE product SET prod_status='4' WHERE prod_sn='$old' AND prod_status='3'";
	$result = $conn->query($sql);
	$sql = "UPDATE product SET prod_status='5', orders_id='$id' WHERE prod_sn='$new' AND prod_status='0'";
	$result = $conn->query($sql);
	require 'stock_update.php';
}
$conn->close();
header("Location: ma_claim_1.php");
?>