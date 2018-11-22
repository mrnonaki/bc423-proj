<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$sql = "INSERT INTO staff VALUES ('$id', '$name', '$tel')";
	$result = $conn->query($sql);
}
?>

<table>
<form method="post">
<tr><td align="right">ID:</td><td><input type="text" name="id"></td></tr>
<tr><td align="right">Name:</td><td><input type="text" name="name"></td></tr>
<tr><td align="right">Tel:</td><td><input type="text" name="tel"></td></tr>
<tr><td align="right"><button type="submit">ยืนยัน</button></td><td><button type="clear">ยกเลิก</button></td></tr>
</form>
</table>

<table>
	<tr>
		<td>ID</td><td>Name</td><td>Tel</td>
	</tr>
<?php
$sql = "SELECT * FROM staff";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["staff_id"]."</td><td>".$row["staff_name"]."</td><td>".$row["staff_tel"]."</td></tr>";
}
?>
</table>
<?php
$conn->close();
?>