<?php
require 'header.php';
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึก / แก้ไข คู่ค้า</h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ma_partner_2.php">
		  <div class="col-sm-12">
			<select class="form-control input-lg m-bot15" name="id">
                <option value="new">รหัสคู่ค้า (สร้างใหม่)</option>
<?php
$sql = "SELECT * FROM partner";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<option value=\"".$row["partner_id"]."\">".$row["partner_id"].": ".$row["partner_name"]."</option>\n";
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