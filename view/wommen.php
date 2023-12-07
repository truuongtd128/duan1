<!DOCTYPE HTML>
<html>
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Trang chủ</a></span> / <span>Nữ</span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Giày Dành Cho Nữ</h2>
					</div>
				</div>
				<div class="row row-pb-md">
					<?php
					foreach($spnu as $sp){
						extract($sp);
						$anh = $img_path .$image;
						$linksp = "index.php?act=sanphamct&idsp=".$id;
						echo '<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
						<a href='.$linksp.' class="prod-img">
						<img src='.$anh.' class="img-fluid" alt="Giày">
						</a>
						<div class="desc">
						<h2><a href="#">'.$name.'</a></h2>
						<span class="price">'.$price.'</span>
						</div>
						</div>
						</div>';
					}
					?>
				</div>
			</div>
		</div>
