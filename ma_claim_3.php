<?php
require 'header.php';
if (isset($_POST['id']) && isset($_POST['prod_sn']) && isset($_POST['type_id']) && isset($_POST['new_sn'])) {
	$id = $_POST['id'];
	$prod_sn = $_POST['prod_sn'];
	$type_id = $_POST['type_id'];
	$new_sn = $_POST['new_sn'];
	if ($prod_sn == $new_sn) {
		$error = 'disabled';
		$alert = 1;
	}
	$sql = "SELECT * FROM product WHERE prod_status='0' AND prod_sn='$new_sn'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if ($row["type_id"] !== $type_id) {
			$error = 'disabled';
			$alert = 2;
		} else {
			$error = '';
			$alert = 0;
		}
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
<?php
if ($alert) {
	if ($alert == 1) {
		echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"icon-remove\"></i></button><strong>S/N: $prod_sn</strong> ไม่สามารถเครมสินค้าตัวเดิมได้</div>";
	} elseif ($alert == 2) {
		echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"icon-remove\"></i></button><strong>S/N: $prod_sn</strong> ไม่สามารถเครมสินค้าต่างประเภทกันได้</div>";
	}
	echo "<meta http-equiv=\"refresh\" content=\"2;url=ma_claim_1.php\">";
}


?>
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>บันทึกการเปลี่ยนสินค้า <?php echo $prod_sn;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ma_claim_4.php">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="prod_sn" value="<?php echo $prod_sn;?>">
		<input type="hidden" name="new_sn" value="<?php echo $new_sn;?>">
		  <div class="col-sm-12">
            <div class="form-group">
              <label class="col-sm-2 control-label">รหัสสินค้า-เก่า</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $prod_sn;?>" disabled>
              </div>
              <label class="col-sm-2 control-label">รหัสสินค้า-ใหม่</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $new_sn;?>" disabled>
              </div>
              <label class="col-sm-2 control-label">หมายเหตุ</label>
              <div class="col-sm-10">
                <textarea type="text" class="form-control input-lg m-bot15" name="claim_reason" placeholder="สาเหตุการเปลี่ยนสินค้า" autofocus <?php echo $error;?>></textarea>
              </div>
			</div>
			<button type="submit" class="btn btn-primary" <?php echo $error;?>>ยืนยัน</button>
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