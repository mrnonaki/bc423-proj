<?php
require 'header.php';
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึก / แก้ไข สินค้า</h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ma_product_2.php">
		  <div class="col-sm-12">
			<select class="form-control input-lg m-bot15" name="type">
                <option value="">รหัสประเภท</option>
<?php
$sql = "SELECT * FROM type";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<option value=\"".$row["type_id"]."\">".$row["type_id"].": ".$row["type_name"]."</option>\n";
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