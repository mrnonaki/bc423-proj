<?php
require 'header.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	echo $id;
	if ($id == 'new') {
		$sql = "SELECT COUNT(*) FROM staff";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = 'E'.sprintf("%04d", $row["COUNT(*)"] + 1);
		$name = "ชื่อพนักงาน";
		$tel = "เบอร์โทรพนักงาน";
		$type = 'insert';
	} else {
		$sql = "SELECT * FROM staff WHERE staff_id = '$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = $row["staff_id"];
		$name = $row["staff_name"];
		$tel = $row["staff_tel"];
		$type = 'update';
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึก / แก้ไข พนักงาน <?php echo $id;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ma_staff_3.php">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="type" value="<?php echo $type;?>">
		  <div class="col-sm-12">
            <div class="form-group">
              <label class="col-sm-2 control-label">ชื่อพนักงาน</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-lg m-bot15" name="name" placeholder="<?php echo $name;?>">
              </div>
              <label class="col-sm-2 control-label">เบอร์โทรพนักงาน</label>
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