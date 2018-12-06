<?php
$alert = 0;
require 'header.php';
if (isset($_POST['old_sn'])) {
	$old_sn = $_POST['old_sn'];
	$sql = "SELECT * FROM product WHERE prod_sn='$old_sn' AND prod_status='3'";
	$result = $conn->query($sql);
	if ($result->num_rows) {
		$alert = 0;
		$sql = "SELECT * FROM product INNER JOIN orders ON product.orders_id = orders.orders_id INNER JOIN type ON product.type_id = type.type_id INNER JOIN customer ON orders.cus_id = customer.cus_id WHERE product.prod_sn='$old_sn'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$prod_sn = $row["prod_sn"];
			$type_id = $row["type_id"];
			$type_name = $row["type_name"];
			$cus_id = $row["cus_id"];
			$cus_name = $row["cus_name"];
			$orders_id = $row["orders_id"];
			$orders_ship = $row["orders_ship"];
		}
		$exp = date("Y-m-d", strtotime($orders_ship."+90days"));
		$expin = ceil((strtotime($exp) - strtotime($orders_ship)) / 86400);
		if ($expin > 0) {
			$canclaim = 1;
		} else {
			$canclaim = 0;
		}
	} else {
		$alert = 1;
		$canclaim = 0;
		$prod_sn = '';
		$type_id = '';
		$type_name = '';
		$cus_id = '';
		$cus_name = '';
		$orders_id = '';
		$orders_ship = '';
		$exp = '';
		$expin = '';
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
<?php
if ($alert) {
	echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"icon-remove\"></i></button><strong>S/N: $old_sn</strong> ยังไม่ถูกขาย หรือไม่พบในระบบ</div>";
	echo "<meta http-equiv=\"refresh\" content=\"2;url=ma_claim_1.php\">";
}
?>
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>บันทึกการเปลี่ยนสินค้า <?php echo $prod_sn;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ma_claim_3.php">
		<input type="hidden" name="id" value="<?php echo $orders_id;?>">
		<input type="hidden" name="prod_sn" value="<?php echo $prod_sn;?>">
		<input type="hidden" name="type_id" value="<?php echo $type_id;?>">
		  <div class="col-sm-12">
            <div class="form-group">
              <label class="col-sm-2 control-label">รหัสสินค้า</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $prod_sn;?>" disabled>
              </div>
              <label class="col-sm-2 control-label">รหัสประเภท</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $type_id.": ".$type_name;?>" disabled>
              </div>
              <label class="col-sm-2 control-label">รหัสการขาย</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $orders_id;?>" disabled>
              </div>
              <label class="col-sm-2 control-label">รหัสลูกค้า</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $cus_id.": ".$cus_name;?>" disabled>
              </div>
              <label class="col-sm-2 control-label">วันที่จัดส่ง</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $orders_ship;?>" disabled>
              </div>
              <label class="col-sm-2 control-label">รับประกันถึง</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $exp;?>" disabled>
              </div>
              <label class="col-sm-2 control-label">เหลือประกัน</label>
              <div class="col-sm-10">
                <input class="form-control input-lg m-bot15" id="disabledInput" type="text" placeholder="<?php echo $expin;?>" disabled>
              </div>
			</div>
<?php
if ($canclaim) {
	echo '
              <label class="col-sm-2 control-label">รหัสสินค้า-ใหม่</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-lg m-bot15" name="new_sn" placeholder="Serial Number" autofocus>
              </div>
	';
}
?>
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