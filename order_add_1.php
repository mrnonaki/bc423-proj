<?php
require 'header.php';
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึกการขาย</h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="order_add_2.php">
          <div class="col-sm-12">
            <section class="panel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ชื่อประเภท</th>
                    <th>ราคาต่อหน่วย</th>
                    <th>ค่าจัดส่งต่อหน่วย</th>
                    <th>จำนวน</th>
                  </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT * FROM type";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	if ($row["type_count"] > 0) {
	echo "<tr><td>".$row["type_name"]."</td><td>".$row["type_price"]."</td><td>".$row["type_rate"]."</td>";
	echo "<td><input class=\"form-control input-sm m-bot15\" type=\"text\" name=\"".$row["type_id"]."\" placeholder=\"".$row["type_count"]."\"></td></tr>\n";
	}
}
?>
                </tbody>
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