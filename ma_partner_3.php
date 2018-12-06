<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['type'])) {
	if ($_POST['type'] == 'insert') {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		if ($name !== '' && $tel !== '') {
			$sql = "INSERT INTO partner VALUES ('$id', '$name', '$tel')";
			$result = $conn->query($sql);
			header("Location: ma_partner_1.php");
		} else {
			echo "<strong>Record ERROR !!!</strong>";
			echo "<meta http-equiv=\"refresh\" content=\"2;url=ma_partner_1.php\">";
			
		}
	} elseif ($_POST['type'] == 'update') {
		$id = $_POST['id'];
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			if ($name !== '') {
				$sql = "UPDATE partner SET partner_name='$name' WHERE partner_id = '$id'";
				$result = $conn->query($sql);
				header("Location: ma_partner_1.php");
			}
		}
		if (isset($_POST['tel'])) {
			$tel = $_POST['tel'];
			if ($tel !== '') {
				$sql = "UPDATE partner SET partner_tel='$tel' WHERE partner_id = '$id'";
				$result = $conn->query($sql);
				header("Location: ma_partner_1.php");
			}
		}
	}
}
$conn->close();
?>