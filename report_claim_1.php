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
            <h3 class="page-header"><i class="fa fa fa-bars"></i> รายงานการรับประกัน ณ วันที่ <?php echo date("Y-m-d");?></h3>
          </div>
        </div>
        <!-- page start-->
          <div class="col-sm-12">
            <section class="panel">
			  <header class="panel-heading">
			    สินค้าเคลม เข้า - ออก
              </header>
              <table class="table table-striped">
                <thead>
                  <tr>
					<th>#</th>
                    <th>Date</th>
					<th>Type</th>
                    <th>IN</th>
                    <th>OUT</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM claim JOIN product ON claim.old_sn = product.prod_sn ORDER BY claim_date DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["orders_id"]."</td><td>".$row["claim_date"]."</td><td>".$row["type_id"]."</td><td>".$row["old_sn"]."</td><td>".$row["new_sn"]."</td></tr>\n";
}
$sql = "SELECT COUNT(*) FROM claim JOIN product ON claim.old_sn = product.prod_sn ORDER BY claim_date DESC";
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