<?php
ob_start();
?>
<style>
    /* CSS cho form lọc */
    form.filter-form {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
    }

    form.filter-form div {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    form.filter-form label {
        white-space: nowrap;
    }

    form.filter-form input[type="text"],
    form.filter-form select {
        width: 100px;
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 4px;
    }

    form.filter-form button[name="loc"] {
        background-color: #ccc;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<!DOCTYPE HTML>
<html>

<head>
	<title>Foot wear</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="view/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="view/css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="view/css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="view/css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="view/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="view/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="view/css/owl.carousel.min.css">
	<link rel="stylesheet" href="view/css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="view/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="view/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="view/css/style.css">

</head>

<body>

	<!-- <div class="colorlib-loader"></div> -->

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index.php">Footwear</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
						<form action="index.php?act=sanpham" class="search-wrap" method="post">
			               <div class="form-group">
			                  <input type="search" class="form-control search" name="kyw" placeholder="Tìm kiếm">
			                  <button class="btn btn-primary submit-search text-center" name="timkiem"  type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
			               </div>
			            </form>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="index.php">Trang chủ</a></li>
								<li class="has-dropdown">
									<a href="index.php?act=men">Nam</a>
									<ul class="dropdown">
										<?php
										foreach ($dsdm as $dm) {
											extract($dm);
											$linkdm = "index.php?act=sanpham&&iddm=" . $id;
											echo '<li><a href="' . $linkdm . '">' . $name . '</a></li>';
										}
										?>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="index.php?act=wommen">Nữ</a>
									<ul class="dropdown">
										<?php
										foreach ($dsdm as $dm) {
											extract($dm);
											$linkdm = "index.php?act=sanpham&&iddm=" . $id;
											echo '<li><a href="' . $linkdm . '">' . $name . '</a></li>';
										}
										?>
									</ul>
								</li>




								<li class="cart"><a href="index.php?act=tatcahoadon"><i class="icon-shopping-cart"></i> Giỏ hàng</a></li>
								<li class="cart"><a href="index.php?act=dangnhap"></i> Tài Khoản</a></li>

							</ul>
						</div>
					</div>
				</div>
				