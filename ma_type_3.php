<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['type'])) {
	if ($_POST['type'] == 'insert') {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$rate = $_POST['rate'];
		$count = 0;
		if ($name !== '') {
			$sql = "INSERT INTO type VALUES ('$id', '$name', '$price', '$rate', '$count')";
			$result = $conn->query($sql);
		}
	} elseif ($_POST['type'] == 'update') {
		$id = $_POST['id'];
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			if ($name !== '') {
				$sql = "UPDATE type SET type_name='$name' WHERE type_id = '$id'";
				$result = $conn->query($sql);
			}
		}
		if (isset($_POST['price'])) {
			$price = $_POST['price'];
			if ($price !== '') {
				$sql = "UPDATE type SET type_price='$price' WHERE type_id = '$id'";
				$result = $conn->query($sql);
			}
		}
		if (isset($_POST['rate'])) {
			$rate = $_POST['rate'];
			if ($rate !== '') {
				$sql = "UPDATE type SET type_rate='$rate' WHERE type_id = '$id'";
				$result = $conn->query($sql);
			}
		}
	}
}
$conn->close();
header("Location: ma_type_1.php");
?>