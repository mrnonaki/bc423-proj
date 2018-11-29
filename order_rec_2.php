<?php
require 'header.php';
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	if (isset($_POST['sn'])) {
		$sn = $_POST['sn'];
		if ($sn !== '') {
			$sql = "SELECT * FROM product WHERE prod_sn='$sn'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
				$type = $row["type_id"];
			}
			$sql = "SELECT COUNT(*) FROM product WHERE orders_id='$id' AND type_id='$type'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
				$typenow = $row["COUNT(*)"];
			}
			$sql = "SELECT * FROM sales WHERE orders_id='$id' AND type_id='$type'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
				$typeneed = $row["sales_count"];
			}
			if ($typenow < $typeneed) {
				$sql = "UPDATE product SET orders_id='$id', prod_status='1' WHERE prod_sn='$sn'";
				$result = $conn->query($sql);
				require 'stock_update.php';
			}
		}
	}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึก S/N <?php echo $id;?></h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		  <div class="col-sm-12">
            <div class="form-group">
                <input type="text" class="form-control input-lg m-bot15" name="sn" placeholder="Add Serial Number" autofocus>
			</div>
          </div>
		</form>
<?php
$sql = "SELECT * FROM sales JOIN type ON sales.type_id = type.type_id WHERE orders_id='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$type = $row["type_id"];
	$count = $row["sales_count"];
	echo '
          <div class="col-sm-4">
            <section class="panel">
              <table class="table table-striped">
                <thead>
                  <tr>
		';
    echo "<th>".$row["type_name"]." (คงเหลือ ".$row["type_count"].")</th>";
	$sqll = "SELECT COUNT(*) FROM product WHERE orders_id='$id' AND type_id='$type'";
	$resultt = $conn->query($sqll);
	while($row = $resultt->fetch_assoc()) {
		echo "<th>".$row["COUNT(*)"]."/".$count."</th>";
	}
	echo '
                  </tr>
                </thead>
                <tbody>
		';
	$sqll = "SELECT * FROM product WHERE orders_id='$id' AND type_id='$type'";
	$resultt = $conn->query($sqll);
	while($row = $resultt->fetch_assoc()) {
		echo "<tr><td>".$row["prod_sn"]."</td><td></td></tr>\n";
	}
		echo '
					</tbody>
				  </table>
				</section>
			  </div>
			';
	}
?>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

  </section>
  <!-- container section end -->
<?php
require 'footer.php';
?>