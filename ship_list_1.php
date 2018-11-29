<?php
require 'header.php';
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> ใบจัดส่ง</h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ship_list_2.php">
		  <div class="col-sm-12">
			<select class="form-control input-lg m-bot15" name="id">
                <option value="">รหัสการขาย</option>
<?php
$sql = "SELECT * FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders.orders_status BETWEEN '1' AND '2'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	if ($row["orders_status"] == '1') {
		$orders_status = 'ยังไม่จัดส่ง';
	} elseif ($row["orders_status"] == '2') {
		$orders_status = 'จัดส่งแล้ว';
	}
	echo "<option value=\"".$row["orders_id"]."\">".$orders_status." ".$row["orders_id"].": ".$row["cus_name"]."</option>\n";
}
?>
            </select>
			<button type="submit" class="btn btn-primary">ยืนยัน</button>
          </div>
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