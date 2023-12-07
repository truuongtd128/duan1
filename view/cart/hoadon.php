<?php
if (isset($donhang) && is_array($donhang)) {
    extract($donhang);
    
  
}
if (isset($_SESSION['user'])) {
    $name = $_SESSION['user']['user'];
    $address = $_SESSION['user']['address'];
    $email = $_SESSION['user']['email'];
    $phone = $_SESSION['user']['phone'];
} else {
    $name = "";
    $address = "";
    $email = "";
    $phone = "";
}
?>
<main class="wrapper-bill">
    <h1 class="box_title" style="text-align: center;">Hoá đơn</h1>
    <div class="bills">
        <div class="bill-information">
            <h3 class="box_title">Thông tin đơn hàng</h3>
            <div class="box-bill" style="min-height: 20px;">
                <p>Mã đơn hàng: DAM-<?= $donhang['id'] ?></p>
                <p>Ngày đặt hàng: <?= $ngaydathang ?></p>
                <p>Phương thức thanh toán: <?= $donhang['pttt'] === 0 ? "Chuyển khoản" : "Thanh toán khi giao hàng" ?></p>
            </div>
            <h3 class="box_title">Thông tin đặt hàng</h3>
            <div class="box-bill" style="min-height: 20px;">
                <p>Người dùng: <?= $name ?></p>
                <p>Địa chỉ: <?= $address ?></p>
                <p>Email: <?= $email ?></p>
                <p>Số điện thoại: <?= $phone ?></p>
            </div>
            <div class="bill-table">
                <h3 class="box_title">Chi tiết giỏ hàng</h3>
                <table style="background-color: #fff;">
                    <tr>
                        <td width="200px">Ảnh</td>
                        <td width="250px">Tên sản phẩm</td>
                        <td width="150px">Đơn giá</td>
                        <td width="100px">Số lượng</td>
                        <td width="150px">Thời gian đặt hàng</td>
                        <td width="150px">Phương thức thanh toán</td>
                    </tr>
                    <?php
                    foreach ($giohang as $value) {
                       
                        extract($value);
                        echo '<tr>
                        <td style="padding: 10px"><img src="view/images/' . $image . '" width="120px"/></td>
                        <td style="padding: 10px">' . $name . '</td>
                        <td style="padding: 10px">' . $price . 'đ</td>
                        <td style="padding: 10px">' . $soluong . ' </td>
                        <td style="padding: 10px">' . $ngaydathang . ' </td>
                        <td style="padding: 10px">' . $pttt . ' </td>
                        </tr>';
                    }
                    ?>
                </table>
                
                <?php
                $tong = 0;
                foreach ($giohang as $value) {
                    extract($value);
                    $tong += $price;
                }
                echo "<h3 style='margin: 15px 0px'>Tổng số tiền: " . $tong . "đ</h3>";
                var_dump($giohang);
                die();
                ?>
            </div>
        </div>
    </div>
</main>