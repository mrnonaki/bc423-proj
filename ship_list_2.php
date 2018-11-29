<?php
require 'header.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];	
	$sql = "SELECT * FROM orders INNER JOIN customer ON orders.cus_id = customer.cus_id INNER JOIN staff ON orders.staff_id = staff.staff_id";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$cus_name = $row["cus_name"];
		$cus_addr = $row["cus_addr"];
		$cus_tel = $row["cus_tel"];
		$orders_ship = $row["orders_ship"];
		$orders_track = $row["orders_track"];
		$partner_id = $row["partner_id"];
		if ($orders_ship == NULL && $orders_track == NULL) {
			$orders_ship = 'ยังไม่จัดส่ง';
			$orders_track =  'ยังไม่จัดส่ง';
		}
		if ($partner_id == '') {
			$partner_name = 'ยังไม่จัดส่ง';
			$partner_tel =  '';
		} else {
			$sql = "SELECT * FROM partner WHERE partner_id='$partner_id'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
				$partner_name = $row["partner_name"];
				$partner_tel = $row["partner_tel"];
			}
		}
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> ใบจัดส่ง <?php echo $id;?></h3>
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
                    <td style="width: 20%"><h3>ใบจัดส่ง</h3></td>
					<td style="width: 20%"></td>
					<td style="width: 20%"></td>
                  </tr>
                  <tr>
                    <td><h5>ชื่อลูกค้า:</h5></td>
                    <td><?php echo $cus_name." (".$cus_tel.")";?></td>
					<td></td>
                    <td><h5>เลขที่ใบจัดส่ง:</h5></td>
					<td><?php echo $id;?></td>
                  </tr>
                  <tr>
                    <td><h5>ที่อยู่ลูกค้า:</h5></td>
                    <td><?php echo $cus_addr;?></td>
                    <td></td>
					<td><h5>วันที่จัดส่ง:</h5></td>
					<td><?php echo $orders_ship;?></td>
                  </tr>
                  <tr>
                    <td><h5>รหัสติดตามพัสดุ:</h5></td>
                    <td><?php echo $orders_track;?></td>
                    <td></td>
					<td><h5>จัดส่งโดย:</h5></td>
					<td><?php echo $partner_name." (".$partner_tel.")";?></td>
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
?>
				  <tr>
				    <td colspan="3"><h4>*** หมายเหตุ: สินค้าทุกชิ้นรับประกัน 90วัน นับจากวันจัดส่ง ***</h4></td>
					<td><h4>รวม</h4></td>
					<td><h4><?php echo $totalcount;?></h4></td>
				  </tr>
                </tbody>
              </table>
            </section>
          </div>
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