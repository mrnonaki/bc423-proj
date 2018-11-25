<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['type'])) {
	if ($_POST['type'] == 'insert') {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$addr = $_POST['addr'];
		$tel = $_POST['tel'];
		$reg = $_POST['reg'];
		if ($name !== '') {
			$sql = "INSERT INTO customer VALUES ('$id', '$name', '$addr', '$tel', '$reg')";
			$result = $conn->query($sql);
		}
	} elseif ($_POST['type'] == 'update') {
		$id = $_POST['id'];
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			if ($name !== '') {
				$sql = "UPDATE customer SET cus_name='$name' WHERE cus_id = '$id'";
				$result = $conn->query($sql);
			}
		}
		if (isset($_POST['addr'])) {
			$addr = $_POST['addr'];
			if ($addr !== '') {
				$sql = "UPDATE customer SET cus_addr='$addr' WHERE cus_id = '$id'";
				$result = $conn->query($sql);
			}
		}
		if (isset($_POST['tel'])) {
			$tel = $_POST['tel'];
			if ($tel !== '') {
				$sql = "UPDATE customer SET cus_tel='$tel' WHERE cus_id = '$id'";
				$result = $conn->query($sql);
			}
		}
	}
}
$conn->close();
header("Location: ma_customer_1.php");
?>