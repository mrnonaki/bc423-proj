<?php
require 'header.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];	
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึกการจัดส่ง <?php echo $id;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ship_rec_3.php">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		  <div class="col-sm-12">
			<select class="form-control input-lg m-bot15" name="partner_id">
                <option value="">รหัสคู่ค้า</option>
<?php
$sql = "SELECT * FROM partner";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<option value=\"".$row["partner_id"]."\">".$row["partner_id"].": ".$row["partner_name"]."</option>\n";
}
?>
            </select>
			<input type="text" class="form-control input-lg m-bot15" name="orders_track" placeholder="Tacking Number">
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