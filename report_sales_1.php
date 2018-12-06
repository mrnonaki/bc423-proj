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
            <h3 class="page-header"><i class="fa fa fa-bars"></i> รายงานการขาย <?php echo date("Y-m-d");?></h3>
          </div>
        </div>
        <!-- page start-->
          <div class="col-sm-4">
            <section class="panel">
			  <header class="panel-heading">
				ยอดขายต่อวัน จัดส่งแล้ว
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Date</th>
					<th>Count</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT orders.orders_date, SUM(sales.sales_count) FROM orders JOIN sales ON orders.orders_id = sales.orders_id WHERE orders.orders_status='2' GROUP BY orders.orders_date";
$result = $conn->query($sql);
$i = 0;
$j = 0;
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_date"]."</td><td>".$row["SUM(sales.sales_count)"]."</td></tr>\n";
	$i++;
	$j = $j + $row["SUM(sales.sales_count)"];
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $i;?> วัน</th>
					<th><?php echo $j;?> ชิ้น</th>
                  </tr>
                </thead>
              </table>
            </section>
          </div>
          <div class="col-sm-4">
            <section class="panel">
			  <header class="panel-heading">
				ยอดขายต่อวัน ชำระแล้ว ยังไม่จัดส่ง
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Date</th>
					<th>Count</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT orders.orders_date, SUM(sales.sales_count) FROM orders JOIN sales ON orders.orders_id = sales.orders_id WHERE orders.orders_status='1' GROUP BY orders.orders_date";
$result = $conn->query($sql);
$i = 0;
$j = 0;
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_date"]."</td><td>".$row["SUM(sales.sales_count)"]."</td></tr>\n";
	$i++;
	$j = $j + $row["SUM(sales.sales_count)"];
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $i;?> วัน</th>
					<th><?php echo $j;?> ชิ้น</th>
                  </tr>
                </thead>
              </table>
            </section>
          </div>
          <div class="col-sm-4">
            <section class="panel">
			  <header class="panel-heading">
				ยอดขายต่อวัน ยังไม่ชำระ
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Date</th>
					<th>Count</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT orders.orders_date, SUM(sales.sales_count) FROM orders JOIN sales ON orders.orders_id = sales.orders_id WHERE orders.orders_status='0' GROUP BY orders.orders_date";
$result = $conn->query($sql);
$i = 0;
$j = 0;
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_date"]."</td><td>".$row["SUM(sales.sales_count)"]."</td></tr>\n";
	$i++;
	$j = $j + $row["SUM(sales.sales_count)"];
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $i;?> วัน</th>
					<th><?php echo $j;?> ชิ้น</th>
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