<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
?>
<form method="post" action="orders.php">
<table>
<tr><td>Product:</td><td>Price/unit</td><td>Ship/unit</td><td>Count</td></tr>
<?php
$sql = "SELECT * FROM type";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["type_name"]."</td><td>".$row["type_price"]."</td><td>".$row["type_rate"]."</td><td><input type=\"text\" name=\"".$row["type_id"]."\" value=\"".$row["type_count"]."\" maxlength=\"3\" size=\"3\"></td></tr>\n";
}
?>
<tr><td align="right"><button type="submit">ยืนยัน</button></td><td><button type="clear">ยกเลิก</button></td></tr>
</table>
</form>
<?php
$conn->close();
?>