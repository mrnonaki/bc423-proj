<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$tel = $_POST['tel'];
	$time = date("Y-m-d");
	$sql = "INSERT INTO customer VALUES ('$id', '$name', '$addr', '$tel', '$time')";
	$result = $conn->query($sql);
}
?>

<table>
<form method="post">
<tr><td align="right">ID:</td><td><input type="text" name="id"></td></tr>
<tr><td align="right">Name:</td><td><input type="text" name="name"></td></tr>
<tr><td align="right">Address:</td><td><input type="text" name="addr"></td></tr>
<tr><td align="right">Tel:</td><td><input type="text" name="tel"></td></tr>
<tr><td align="right"><button type="submit">ยืนยัน</button></td><td><button type="clear">ยกเลิก</button><td></tr>
</form>
</table>

<table>
	<tr>
		<td>ID</td><td>Name</td><td>Address</td><td>Tel</td><td>Register</td>
	</tr>
<?php
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["cus_id"]."</td><td>".$row["cus_name"]."</td><td>".$row["cus_addr"]."</td><td>".$row["cus_tel"]."</td><td>".$row["cus_reg"]."</td></tr>";
}
?>
</table>
<?php
$conn->close();
?>