<?php
require 'header.php';
$sql = "SELECT COUNT(*) FROM orders";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = 'O'.sprintf("%03d", $row["COUNT(*)"] + 1);
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึกการขาย <?php echo $id;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="order_add_3.php">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		  <div class="col-sm-12">
			<select class="form-control input-lg m-bot15" name="staff">
                <option>เลือกพนักงานขาย</option>
<?php
$sql = "SELECT * FROM staff";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<option value=\"".$row["staff_id"]."\">".$row["staff_id"].": ".$row["staff_name"]."</option>\n";
}
?>
            </select>
			<select class="form-control input-lg m-bot15" name="customer">
                <option>เลือกลูกค้า</option>
<?php
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<option value=\"".$row["cus_id"]."\">".$row["cus_id"].": ".$row["cus_name"]."</option>\n";
}
?>
            </select>
            <section class="panel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ชื่อประเภท</th>
                    <th>จำนวน</th>
                    <th>ราคา</th>
                  </tr>
                </thead>
                <tbody>
<?php
$typetotal = 0;
$counttotal = 0;
$net = 0;
$sql = "SELECT * FROM type";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	if (isset($_POST[$row["type_id"]])) {
		$typecount = $_POST[$row["type_id"]];
		if ($typecount > 0 && $typecount <= $row["type_count"]) {
			$typetotal = ($row["type_price"] + $row["type_rate"]) * $typecount;
			$counttotal = $counttotal + $typecount;
			$net = $net + $typetotal;
			echo "<tr><td>".$row["type_name"]."</td><td>".$typecount."</td><td>".$typetotal."</td></tr>\n";
			echo "<input type=\"hidden\" name=\"".$row["type_id"]."\" value=\"".$typecount."\">\n";
		}
	}
}
?>
                </tbody>
                <thead>
                  <tr>
                    <th>รวม</th>
<?php
echo "<th>".$counttotal."</th>\n";
echo "<th>".$net."</th>\n";
echo "<input type=\"hidden\" name=\"amount\" value=\"".$net."\">\n";
?>
                  </tr>
                </thead>
              </table>
            </section>
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