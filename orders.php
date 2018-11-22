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
	$sql = "INSERT INTO orders VALUES ('$id', '$time', '', '', '$amount', '$status', '$staff', '$customer')";
	$result = $conn->query($sql);
}
?>

<form method="post">
<table>
<tr><td align="right">ID:</td><td><input type="text" name="id"></td></tr>
<tr><td align="right">Staff:</td>
<td><select name="staff">
<option selected value="">เลือกพนักงาน</option>
<?php
$sql = "SELECT * FROM staff";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<option value=\"".$row["staff_id"]."\">".$row["staff_name"]."</option>\n";
}
?>
</select></td></tr>
<tr><td align="right">Customer:</td>
<td><select name="customer">
<option selected value="">เลือกลูกค้า</option>
<?php
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<option value=\"".$row["cus_id"]."\">".$row["cus_name"]."</option>\n";
}
?>
</select></td></tr></table>

<table>
<tr><td>Product: <a href="check.php">edit</a></td><td>Count</td><td>Total</td></tr>
<?php
$count = 0;
$net = 0;
$sql = "SELECT * FROM type";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	if (isset($_POST[$row["type_id"]])) {
		$typecount = $_POST[$row["type_id"]];
		$count = $count + $typecount;
		if ($typecount > 0) {
			$typetotal = ($row["type_price"] + $row["type_rate"]) * $count;
			$net = $net + $typetotal;
			echo "<tr><td>".$row["type_name"]."</td><td>".$typecount."</td><td>".$typetotal."</td></tr>\n";
		}
	}
}
if ($count > 0) {
	echo "<tr><td></td><td>".$count."</td><td><input type=\"text\" name=\"amount\" value=\"".$net."\" size=\"7\" readonly></td></tr>";
}
?>
</table>

<table><tr><td align="right"><button type="submit">ยืนยัน</button></td><td><button type="clear">ยกเลิก</button></td></tr></table>
</form>

<table>
	<tr>
		<td>ID</td><td>Date</td><td>Staff</td><td>Customer</td><td>Amount</td><td>Status</td>
	</tr>
<?php
$sql = "SELECT * FROM orders JOIN staff, customer WHERE orders.staff_id = staff.staff_id AND orders.cus_id = customer.cus_id";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td><a href=\"orders-1.php?edit=".$row["orders_id"]."\">".$row["orders_id"]."</a></td><td>".$row["orders_date"]."</td><td>".$row["staff_name"]."</td><td>".$row["cus_name"]."</td><td>".$row["orders_amount"]."</td><td>".$row["orders_status"]."</td></tr>";
}
?>
</table>
<?php
$conn->close();
?>