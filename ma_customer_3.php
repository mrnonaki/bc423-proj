<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['type'])) {
	if ($_POST['type'] == 'insert') {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$addr = $_POST['addr'];
		$tel = $_POST['tel'];
		$reg = date("Y-m-d");
		if ($name !== '' && $addr !== '' && $tel !== '') {
			$sql = "INSERT INTO customer VALUES ('$id', '$name', '$addr', '$tel', '$reg')";
			$result = $conn->query($sql);
			header("Location: ma_customer_1.php");
		} else {
			echo "<strong>Record ERROR !!!</strong>";
			echo "<meta http-equiv=\"refresh\" content=\"2;url=ma_customer_1.php\">";
		}
	} elseif ($_POST['type'] == 'update') {
		$id = $_POST['id'];
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			if ($name !== '') {
				$sql = "UPDATE customer SET cus_name='$name' WHERE cus_id = '$id'";
				$result = $conn->query($sql);
				header("Location: ma_customer_1.php");
			}
		}
		if (isset($_POST['addr'])) {
			$addr = $_POST['addr'];
			if ($addr !== '') {
				$sql = "UPDATE customer SET cus_addr='$addr' WHERE cus_id = '$id'";
				$result = $conn->query($sql);
				header("Location: ma_customer_1.php");
			}
		}
		if (isset($_POST['tel'])) {
			$tel = $_POST['tel'];
			if ($tel !== '') {
				$sql = "UPDATE customer SET cus_tel='$tel' WHERE cus_id = '$id'";
				$result = $conn->query($sql);
				header("Location: ma_customer_1.php");
			}
		}
	}
}
$conn->close();
?>