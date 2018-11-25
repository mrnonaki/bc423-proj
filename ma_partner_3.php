<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['type'])) {
	if ($_POST['type'] == 'insert') {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		if ($name !== '') {
			$sql = "INSERT INTO partner VALUES ('$id', '$name', '$tel')";
			$result = $conn->query($sql);
		}
	} elseif ($_POST['type'] == 'update') {
		$id = $_POST['id'];
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			if ($name !== '') {
				$sql = "UPDATE partner SET partner_name='$name' WHERE partner_id = '$id'";
				$result = $conn->query($sql);
			}
		}
		if (isset($_POST['tel'])) {
			$tel = $_POST['tel'];
			if ($tel !== '') {
				$sql = "UPDATE partner SET partner_tel='$tel' WHERE partner_id = '$id'";
				$result = $conn->query($sql);
			}
		}
	}
}
$conn->close();
header("Location: ma_partner_1.php");
?>