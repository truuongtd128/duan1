<style>
select[name="size"] {
	width: 100px;
	height: 40px;
}
.full-width-iframe {
    width: 100%;
    height: 300px;
    border: none;
  }

</style>
<div class="colorlib-product">
			<div class="container">
				<h3 style="text-transform: uppercase;"></h3>
				<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
					<h2>Sản phẩm</h2>
				</div>
				<div class="roww">
                    <div class="giatrai">
						<?php
							extract($onesp);
						?>
						<div class="box_content">
							<?php 
								 $anh = $img_path . $image;
								echo '<img src ="'.$anh.'" width="600px" height="600px"><br>';
							?>
						</div>
					</div>
					<div class="giaphai">
						<h2 style="text-transform: uppercase;"><?=$name?></h2>
						<p>
								<span class="rate">
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-half"></i>
									
								</span>
						</p>	
						<?php 
							echo '<div class="price">
									<h3>Giá :</h3>
									<h3>'.$price.' VND</h3>
									<br></br>
									

								</div>';
						?>
						
						<?php
						echo '<div class="price">
						<h4> '.$mota.'</h4>

						</div>';
						?>
						
						<?php
						if (isset($_SESSION['user'])) {
							// Người dùng đã đăng nhập
							// Thực hiện thêm vào giỏ hàng
						extract($onesp);
							echo '
							
							<form action="index.php?act=addtocard" method="post" enctype="multipart/form-data" >
										<h5>Số Lượng</h5>
										<div class="soluong">
											
											<span class="input-group-btn" onclick="minus()">
												<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
											<i class="icon-minus2"></i>
												</button>
												</span>
											<input type="text" id="quantity" name="soluong" class="" value="1" min="1" max="100">
											<span class="input-group-btn ml-1" onclick="plus()">
												<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
												<i class="icon-plus2"></i>
											</button>
											</span>
										</div>
										<input type="hidden" name="image"  value="'.$image.'">
										<input type="hidden" name="price"  value="'.$price.'">
										<input type="hidden" name="id"  value="'.$id.'">
										<input type="hidden" name="name"  value="'.$name.'">
										
										<div class="dathang">
											
											<input type="submit" name="addtocart" value="Thêm vào giỏ">
										</div>
							</form>
							';
						} else {
							// Người dùng chưa đăng nhập
							// Hiển thị thông báo và yêu cầu đăng nhập
							echo "Vui lòng đăng nhập để thêm vào giỏ hàng.";
						}
						?>		
     		</div>	
								</div>
			
                <div class="  mb ">
                    <div class="box_title">
						<h3>SẢN PHẨM CÙNG LOẠI</h3>
					</div>
						<div class="abc">
                        	<?php
                            	foreach($sp_cung_loai as $sp_cung_loai){
                                	extract($sp_cung_loai);
									$anh = $img_path . $image;
                                	$linksp = "index.php?act=sanphamct&idsp=".$id;
                                	echo '<div class="col-lg-3 mb-4 text-center ">
                            <div class="product-entry border">
                                <a href="'.$linksp.'" class="prod-img">
                                    <img src="'.$anh.'" class="img-fluid" alt="Free html5 bootstrap 4 template">
                                </a>
                                <div class="desc">
                                    <h2><a href="'.$linksp.'">'. $name . '</a></h2>
                                </div>
                            </div>
                        </div> ';
                            	}
                        	?>
						</div>
                	</div>
            	</div>
				<div class="mbb">
                    <div class="box_title"><h2>Bình Luận</h2></div>
                    <div class="box_content2  product_portfolio binhluan ">
                    <iframe src="view/binhluan/binhluan.php?id_sp=<?=$id?>" frameborder="0" width="100%" height="300px" style="background-color: aquamarine;"></iframe>
                    </div>
                </div>
			
        <!-- BANNER 2 -->
		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Thương hiệu phổ biến</h2>
					</div>
				</div>
				<div class="rowww">
					<div class="col partner-col text-center">
						<img src="view/images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template "> 
					</div>
					<div class="col partner-col text-center">
						<img src="view/images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="view/images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="view/images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>
        