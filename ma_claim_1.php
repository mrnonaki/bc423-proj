<?php
require 'header.php';
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> บันทึกการเปลี่ยนสินค้า</h3>
          </div>
        </div>
        <!-- page start-->
		<form method="post" action="ma_claim_2.php">
		  <div class="col-sm-12">
            <div class="form-group">
              <label class="col-sm-2 control-label">S/N สินค้าที่ต้องการเปลี่ยน</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-lg m-bot15" name="old_sn" placeholder="Serial Number" autofocus>
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