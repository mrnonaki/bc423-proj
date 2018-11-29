<?php
require 'header.php';
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['type'])) {
	$type = $_POST['type'];
	if (isset($_POST['sn'])) {
		$sn = $_POST['sn'];
		if ($sn !== '') {
			$date = date("Y-m-d");
			$status = '0';
			$sql = "INSERT INTO product VALUES ('$sn', '$type', '$date', '$status', NULL)";
			$result = $conn->query($sql);
			require 'stock_update.php';
		}
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
<?php
$sql = "SELECT * FROM type WHERE type_id='$type'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$count = $row["type_count"];
}
$sql = "SELECT COUNT(*) FROM product WHERE type_id='$type'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$total = $row["COUNT(*)"];
}
?>
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึก / แก้ไข สินค้า <?php echo $type." (คงเหลือ ".$count." / ".$total.")";?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post">
		<input type="hidden" name="type" value="<?php echo $type;?>">
		  <div class="col-sm-12">
            <div class="form-group">
                <input type="text" class="form-control input-lg m-bot15" name="sn" placeholder="Add Serial Number" autofocus>
			</div>
          </div>
		</form>
          <div class="col-sm-12">
            <section class="panel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Serial Number</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM product WHERE type_id='$type' ORDER BY prod_in DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	if ($row["prod_status"] == '0') {
		$status = $row["prod_status"].': พร้อมจำหน่าย';
	} elseif ($row["prod_status"] == '1') {
		$status = $row["prod_status"].': รอชำระ '.$row["orders_id"];
	} elseif ($row["prod_status"] == '2') {
		$status = $row["prod_status"].': ชำระแล้ว '.$row["orders_id"];
	} elseif ($row["prod_status"] == '3') {
		$status = $row["prod_status"].': จัดส่งแล้ว '.$row["orders_id"];
	} elseif ($row["prod_status"] == '4') {
		$status = $row["prod_status"].': เคลมเข้า '.$row["orders_id"];
	} elseif ($row["prod_status"] == '5') {
		$status = $row["prod_status"].': เคลมออก '.$row["orders_id"];
	} else {
		$status = $row["prod_status"];
	}
	echo "<tr><td>".$row["prod_sn"]."</td><td>".$row["prod_in"]."</td><td>".$status."</td></tr>\n";
}
?>
                </tbody>
              </table>
            </section>
          </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

  </section>
  <!-- container section end -->
<?php
require 'footer.php';
?>