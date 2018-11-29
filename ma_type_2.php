<?php
require 'header.php';
if (isset($_POST['id']) && isset($_POST['newid'])) {
	$id = $_POST['id'];
	$newid = $_POST['newid'];
	if ($id !== '') {
		$sql = "SELECT * FROM type WHERE type_id = '$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = $row["type_id"];
		$name = $row["type_name"];
		$price = $row["type_price"];
		$rate = $row["type_rate"];
		$type = 'update';
	} elseif ($newid !== '') {
		$id = $newid;
		$name = "ชื่อประเภท (สร้างใหม่)";
		$price = "ราคาต่อหน่วย (สร้างใหม่)";
		$rate = "ค่าจัดส่งต่อหน่วย (สร้างใหม่)";
		$type = 'insert';
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึก / แก้ไข ประเภท <?php echo $id;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ma_type_3.php">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="type" value="<?php echo $type;?>">
		  <div class="col-sm-12">
            <div class="form-group">
              <label class="col-sm-2 control-label">ชื่อประเภท</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-lg m-bot15" name="name" placeholder="<?php echo $name;?>">
              </div>
              <label class="col-sm-2 control-label">ราคาต่อหน่วย</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-lg m-bot15" name="price" placeholder="<?php echo $price;?>">
              </div>
              <label class="col-sm-2 control-label">ค่าจัดส่งต่อหน่วย</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-lg m-bot15" name="rate" placeholder="<?php echo $rate;?>">
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