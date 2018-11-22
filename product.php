<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['sn'])) {
	$sn = $_POST['sn'];
	$type = $_POST['type'];
	$time = date("Y-m-d");
	$status = 0;
	$sql = "INSERT INTO product VALUES ('$sn', '$time', '$status', '$type')";
	$result = $conn->query($sql);
}
?>

<table>
<form method="post">
<tr><td align="right">Type:</td>
<td><select name="type">
<option selected value="">เลือกประเภทสินค้า</option>
<?php
$sql = "SELECT * FROM type";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<option value=\"".$row["type_id"]."\">".$row["type_name"]."</option>\n";
}
?>
</select></td></tr>
<tr><td align="right">S/N:</td><td><input type="text" name="sn"></td></tr>
<tr><td align="right"><button type="submit">ยืนยัน</button></td><td><button type="clear">ยกเลิก</button></td></tr>
</form>
</table>

<table>
	<tr>
		<td>S/N</td><td>Type</td><td>IN</td><td>Status</td>
	</tr>
<?php
$sql = "SELECT * FROM product JOIN type WHERE product.type_id = type.type_id";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["prod_sn"]."</td><td>".$row["type_name"]."</td><td>".$row["prod_in"]."</td><td>".$row["prod_status"]."</td></tr>";
}
?>
</table>
<?php
$conn->close();
?>