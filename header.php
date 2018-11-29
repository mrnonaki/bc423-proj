<?php
$conn = new mysqli("localhost", "root", "", "proj-warranty");
$conn->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>BC423</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />


</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->

    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">BC<span class="lite">423</span></a>
      <!--logo end-->


    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="home.php">
                          <i class="icon_house_alt"></i>
                          <span>หน้าหลัก</span>
                      </a>
		  </li>
          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>ขายสินค้า</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="order_add_1.php">บันทึกการขาย</a></li>
              <li><a class="" href="order_rec_1.php">บันทึก S/N</a></li>
              <li><a class="" href="order_invoice_1.php">ใบเสร็จรับเงิน</a></li>
            </ul>
          </li>					  
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>จัดส่ง / ประกัน</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="ship_list.html">ใบจัดส่ง</a></li>
              <li><a class="" href="ship_rec.html">บันทึกการจัดส่ง</a></li>
			  <li><a class="" href="product_warranty.html">บันทึกการเปลี่ยนสินค้า</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>จัดการข้อมูล</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="ma_type_1.php">บันทึก / แก้ไข ประเภท</a></li>
			  <li><a class="" href="ma_product_1.php">บันทึก / แก้ไข สินค้า</a></li>
			  <li><a class="" href="ma_customer_1.php">บันทึก / แก้ไข ลูกค้า</a></li>
			  <li><a class="" href="ma_staff_1.php">บันทึก / แก้ไข พนักงาน</a></li>
			  <li><a class="" href="ma_partner_1.php">บันทึก / แก้ไข คู่ค้า</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>รายงาน</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="report_sales.html">การขาย</a></li>
              <li><a class="" href="report_product.html">สินค้าแยกประเภท</a></li>
			  <li><a class="" href="report_ship.html">การจัดส่ง</a></li>
			  <li><a class="" href="report_warranty.html">การรับประกัน</a></li>
			  <li><a class="" href="report_payment.html">การรับชำระ</a></li>
            </ul>
          </li>
          <li class="">
            <a class="" href="help.html">
                          <i class="icon_document_alt"></i>
                          <span>คู่มือ</span>
                      </a>
		  </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->