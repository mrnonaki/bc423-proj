<?php
require 'header.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	echo $id;
	if ($id == 'new') {
		$sql = "SELECT COUNT(*) FROM partner";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = 'P'.sprintf("%03d", $row["COUNT(*)"] + 1);
		$name = "ชื่อคู่ค้า";
		$tel = "เบอร์โทรคู่ค้า";
		$type = 'insert';
	} else {
		$sql = "SELECT * FROM partner WHERE partner_id = '$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = $row["partner_id"];
		$name = $row["partner_name"];
		$tel = $row["partner_tel"];
		$type = 'update';
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึก / แก้ไข คู่ค้า <?php echo $id;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ma_partner_3.php">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="type" value="<?php echo $type;?>">
		  <div class="col-sm-12">
            <div class="form-group">
              <label class="col-sm-2 control-label">ชื่อคู่ค้า</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-lg m-bot15" name="name" placeholder="<?php echo $name;?>">
              </div>
              <label class="col-sm-2 control-label">เบอร์โทรคู่ค้า</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-lg m-bot15" name="tel" placeholder="<?php echo $tel;?>">
              </div>
			</div>
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