<?php
require 'header.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if (isset($_POST['confirm'])) {
		$confirm = $_POST['confirm'];
		if ($confirm == 'confirmed') {
			$date = date("Y-m-d");
			$sql = "UPDATE orders SET orders_status='1', orders_pay='$date' WHERE orders_id = '$id' AND orders_status='0'";
			$result = $conn->query($sql);
			$sql = "UPDATE product SET prod_status='2' WHERE orders_id='$id' AND prod_status='1'";
			$result = $conn->query($sql);
		}
	}
	$sql = "SELECT * FROM orders INNER JOIN customer ON orders.cus_id = customer.cus_id INNER JOIN staff ON orders.staff_id = staff.staff_id";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$cus_name = $row["cus_name"];
		$cus_addr = $row["cus_addr"];
		$staff_name = $row["staff_name"];
		$order_date = $row["orders_date"];
		$orders_pay = $row["orders_pay"];
		$order_amount = $row["orders_amount"];
		
		if ($orders_pay == NULL) {
			$confirmed = '';
			$orders_pay = 'ยังไม่ชำระ';
		} else {
			$confirmed = 'checked disabled';
		}
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> ใบเสร็จรับเงิน <?php echo $id;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post">
		<input type="hidden" name="id" value="<?php echo $id;?>">
          <div id="printableArea" class="col-sm-12">
            <section class="panel">
              <table class="table">
                <tbody>
                  <tr>
				    <td style="width: 20%"></td>
				    <td style="width: 20%"></td>
                    <td style="width: 20%"><h3>ใบเสร็จรับเงิน</h3></td>
					<td style="width: 20%"></td>
					<td style="width: 20%"></td>
                  </tr>
                  <tr>
                    <td><h5>ชื่อลูกค้า:</h5></td>
                    <td><?php echo $cus_name;?></td>
					<td></td>
                    <td><h5>เลขที่ใบเสร็จ:</h5></td>
					<td><?php echo $id;?></td>
                  </tr>
                  <tr>
                    <td><h5>ที่อยู่ลูกค้า:</h5></td>
                    <td><?php echo $cus_addr;?></td>
                    <td></td>
					<td><h5>วันที่สั่งซื้อ:</h5></td>
					<td><?php echo $order_date;?></td>
                  </tr>
                  <tr>
                    <td><h5>พนักงานขาย:</h5></td>
					<td><?php echo $staff_name;?></td>
                    <td></td>
                    <td><h5>วันที่ชำระ:</h5></td>
					<td><?php echo $orders_pay;?></td>
                  </tr>
				  <tr>
				    <td><h4>รายการ</h4></td>
					<td></td>
					<td></td>
					<td></td>
					<td><h4>จำนวน</h4></td>
				  </tr>
<?php
$sql = "SELECT * FROM sales JOIN type ON sales.type_id = type.type_id WHERE orders_id='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$type = $row["type_id"];
	echo "<tr>\n";
	echo "<td colspan=\"4\">".$row["type_name"]."</td>\n";
	echo "<td>".$row["sales_count"]."</td>\n";
	echo "</tr>\n";
	$sqll = "SELECT * FROM product WHERE orders_id='$id' AND type_id='$type'";
	$resultt = $conn->query($sqll);
	$i = 0;
	while($row = $resultt->fetch_assoc()) {
		if ($i == 0) {
			echo "<tr>\n";
			echo "<td>".$row["prod_sn"]."</td>\n";
			$i++;
		} elseif ($i > 0 && $i < 4) {
			echo "<td>".$row["prod_sn"]."</td>\n";
			$i++;
			if ($i == 4) {
				echo "</tr>\n";
				$i = 0;
			}
		}
	}
}
$sql = "SELECT SUM(sales_count) FROM sales WHERE orders_id='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$totalcount = $row["SUM(sales_count)"];
}
$sql = "SELECT * FROM product WHERE orders_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows != $totalcount) {
	$concount = '0';
} else {
	$concount = '1';
}
?>
				  <tr>
				    <td></td>
					<td></td>
					<td></td>
					<td><h4>รวม</h4></td>
					<td><h4><?php echo $totalcount;?></h4></td>
				  </tr>
				  <tr>
				    <td></td>
					<td></td>
					<td></td>
					<td><h4>ยอดชำระสุทธิ</h4></td>
					<td><h4><?php echo $order_amount;?></h4></td>
				  </tr>
                </tbody>
              </table>
            </section>
          </div>
<?php
if ($concount) {
	echo '
		  <div class="checkbox">
            <label>
              <input type="checkbox" name="confirm" value="confirmed" '.$confirmed.'>
			  ชำระเรียบร้อยแล้ว
            </label>
          </div>
		  <button type="submit" class="btn btn-primary">ยืนยัน</button>
		  ';
}
?>
		  <button type="button" class="btn btn-primary" onclick="printDiv('printableArea')">Print</button>
		</form>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

  </section>
  <!-- container section end -->
<?php
require 'footer.php';
?>