<?php
if (isset($_POST['loc'])) {
    $iddm = $_POST['danhmuc'] ?? 0;
    $gioitinh = $_POST['gioitinh'] ?? '';
    $giatoithieu = $_POST['giatoithieu'] ?? '';
    $giatoida = $_POST['giatoida'] ?? '';
} else {
    $iddm = 0;
    $gioitinh = '';
    $giatoithieu = '';
    $giatoida = '';
}
$ds_sanpham = loadall_sanpham($kyw, $iddm, $giatoithieu, $giatoida, $gioitinh);

?>

<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
						<h2>Sản phẩm <?=$tendm?></h2>
					</div>
				</div>
				<div class="abc">
                    <?php
                        $i = 0;
                        foreach ($dssp as $sp) {
                            extract($sp);
                            $linksp = "index.php?act=sanphamct&idsp=".$id;
                            $anh = $img_path . $image;
                            echo '<div class="col-lg-3 mb-4 text-center ">
                            <div class="product-entry border">
                                <a href="'.$linksp.'" class="prod-img">
                                    <img src="'.$anh.'" class="img-fluid" alt="Free html5 bootstrap 4 template">
                                </a>
                                <div class="desc">
                                    <h2><a href="'.$linksp.'">'. $name .'</a></h2>
                                    <span class="price">'.$price.'</span>
                                </div>
                            </div>
                        </div> ';
                        $i+= 1;
                        }
                    ?>
				</div>
					