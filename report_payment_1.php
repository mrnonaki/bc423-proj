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
            <h3 class="page-header"><i class="fa fa fa-bars"></i> รายงานการรับชำระ <?php echo date("Y-m-d");?></h3>
          </div>
        </div>
        <!-- page start-->
          <div class="col-sm-4">
            <section class="panel">
			  <header class="panel-heading">
			    ใบสั่งซื้อ รับชำระแล้ว จัดส่งแล้ว
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
					<th>Date</th>
                    <th>Customer</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='2' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_id"]."</td><td>".$row["orders_date"]."</td><td>".$row["cus_name"]."</td><td>".$row["orders_amount"]."</td></tr>\n";
}
$sql = "SELECT COUNT(*) FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='2' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$count = $row["COUNT(*)"];
}
$sql = "SELECT SUM(orders_amount) FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='2' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$sum = $row["SUM(orders_amount)"];
}
if ($sum == '') {
	$sum = 0;
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $count;?> ใบสั่งซื้อ</th>
					<th></th>
					<th></th>
					<th><?php echo $sum;?> บาท</th>
                  </tr>
                </thead>
              </table>
            </section>
          </div>
          <div class="col-sm-4">
            <section class="panel">
			  <header class="panel-heading">
			    ใบสั่งซื้อ รับชำระแล้ว ยังไม่จัดส่ง
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
					<th>Date</th>
                    <th>Customer</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='1' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_id"]."</td><td>".$row["orders_date"]."</td><td>".$row["cus_name"]."</td><td>".$row["orders_amount"]."</td></tr>\n";
}
$sql = "SELECT COUNT(*) FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='1' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$count = $row["COUNT(*)"];
}
$sql = "SELECT SUM(orders_amount) FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='1' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$sum = $row["SUM(orders_amount)"];
}
if ($sum == '') {
	$sum = 0;
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $count;?> ใบสั่งซื้อ</th>
					<th></th>
					<th></th>
					<th><?php echo $sum;?> บาท</th>
                  </tr>
                </thead>
              </table>
            </section>
          </div>
          <div class="col-sm-4">
            <section class="panel">
			  <header class="panel-heading">
			    ใบสั่งซื้อ ยังไม่ชำระ
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
					<th>Date</th>
                    <th>Customer</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='0' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_id"]."</td><td>".$row["orders_date"]."</td><td>".$row["cus_name"]."</td><td>".$row["orders_amount"]."</td></tr>\n";
}
$sql = "SELECT COUNT(*) FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='0' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$count = $row["COUNT(*)"];
}
$sql = "SELECT SUM(orders_amount) FROM orders JOIN customer ON orders.cus_id = customer.cus_id WHERE orders_status='0' ORDER BY orders_pay DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$sum = $row["SUM(orders_amount)"];
}
if ($sum == '') {
	$sum = 0;
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $count;?> ใบสั่งซื้อ</th>
					<th></th>
					<th></th>
					<th><?php echo $sum;?> บาท</th>
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