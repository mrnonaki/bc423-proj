<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['type'])) {
	if ($_POST['type'] == 'insert') {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		if ($name !== '') {
			$sql = "INSERT INTO staff VALUES ('$id', '$name', '$tel')";
			$result = $conn->query($sql);
		}
	} elseif ($_POST['type'] == 'update') {
		$id = $_POST['id'];
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			if ($name !== '') {
				$sql = "UPDATE staff SET staff_name='$name' WHERE staff_id = '$id'";
				$result = $conn->query($sql);
			}
		}
		if (isset($_POST['tel'])) {
			$tel = $_POST['tel'];
			if ($tel !== '') {
				$sql = "UPDATE staff SET staff_tel='$tel' WHERE staff_id = '$id'";
				$result = $conn->query($sql);
			}
		}
	}
}
$conn->close();
header("Location: ma_staff_1.php");
?>