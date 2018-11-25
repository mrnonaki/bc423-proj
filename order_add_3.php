<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$time = date("Y-m-d");
	$staff = $_POST['staff'];
	$customer = $_POST['customer'];
	$amount = $_POST['amount'];
	$status = 0;
	$sql = "INSERT INTO orders VALUES ('$id', '$time', '', '', '', '$amount', '$status', '$staff', '$customer')";
	$result = $conn->query($sql);
	
	$sql = "SELECT * FROM type";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if (isset($_POST[$row["type_id"]])) {
			$type = $row["type_id"];
			$count = $_POST[$row["type_id"]];
			$sqll = "INSERT INTO sales VALUES (NULL, '$id', '$type', NULL);";
			for ($i = 0; $i < $count; $i++) {
				$resultt = $conn->query($sqll);
			}
		}
	}
}
$conn->close();
header("Location: order_add_1.php");
?>