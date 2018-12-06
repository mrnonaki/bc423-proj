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
            <h3 class="page-header"><i class="fa fa fa-bars"></i> รายงานสินค้าแยกประเภท <?php echo date("Y-m-d");?></h3>
          </div>
        </div>
        <!-- page start-->
          <div class="col-sm-12">
            <section class="panel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
					<th>Name</th>
					<th>พร้อมจำหน่าย</th>
					<th>รอชำระ</th>
					<th>ชำระแล้ว</th>
					<th>จัดส่งแล้ว</th>
					<th>เคลมเข้า</th>
					<th>เคลมออก</th>
					<th>รวม</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM type";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["type_id"]."</td><td>".$row["type_name"]."</td>";
	$type = $row["type_id"];
	$sum = 0;
	for ($i = 0; $i <= 5; $i++) {
		$sqll = "SELECT COUNT(*) FROM product WHERE type_id='$type' AND prod_status='$i'";
		$resultt = $conn->query($sqll);
		while($row = $resultt->fetch_assoc()) {
			echo "<td>".$row["COUNT(*)"]."</td>";
			$sum = $sum + $row["COUNT(*)"];
		}
	}
	echo "<td>".$sum."</td>";
	echo "</tr>\n";
}
$sql = "SELECT COUNT(*) FROM type";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$count = $row["COUNT(*)"];
}
$sql = "SELECT COUNT(*) FROM product";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$sum = $row["COUNT(*)"];
}
if ($sum == '') {
	$sum = 0;
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th><?php echo $count;?> ประเภท</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th><?php echo $sum;?> ชิ้น</th>
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