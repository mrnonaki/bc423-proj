<?php
require 'header.php';
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
?>
    <!--main content start-->
    <section id="main-content">
      <section id="printableArea" class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> รายงานการจัดส่ง <?php echo date("Y-m-d");?></h3>
          </div>
        </div>
        <!-- page start-->
          <div class="col-sm-12">
            <section class="panel">
			  <header class="panel-heading">
			    ใบสั่งซื้อ รับชำระแล้ว ยังไม่จัดส่ง
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
					<th>#</th>
					<th>ODate</th>
                    <th>Name</th>
					<th>Address</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='1' ORDER BY orders_date";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_id"]."</td><td>".$row["orders_date"]."</td><td>".$row["cus_name"]."</td><td>".$row["cus_addr"]."</td></tr>\n";
}
$sql = "SELECT COUNT(*) FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='1' ORDER BY orders_date";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$count = $row["COUNT(*)"];
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $count;?> รายการ</th>
					<th></th>
					<th></th>
					<th></th>
                  </tr>
                </thead>
              </table>
            </section>
          </div>
          <div class="col-sm-12">
            <section class="panel">
			  <header class="panel-heading">
			    ใบสั่งซื้อ จัดส่งแล้ว
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
					<th>#</th>
					<th>SDate</th>
                    <th>Name</th>
					<th>Address</th>
					<th>Tracking</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='2' ORDER BY orders_date";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_id"]."</td><td>".$row["orders_ship"]."</td><td>".$row["cus_name"]."</td><td>".$row["cus_addr"]."</td><td>".$row["orders_track"]."</td></tr>\n";
}
$sql = "SELECT COUNT(*) FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='2' ORDER BY orders_date";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$count = $row["COUNT(*)"];
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $count;?> รายการ</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
                  </tr>
                </thead>
              </table>
            </section>
          </div>
        <!-- page end-->
      </section>
	  <button type="button" class="btn btn-primary" onclick="printDiv('printableArea')">Print</button>
    </section>
    <!--main content end-->

  </section>
  <!-- container section end -->
<?php
require 'footer.php';
?>