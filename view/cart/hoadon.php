<style>
    .wrapper-bill {
  background-color: #fff;
  margin: 0 auto;
  width: 80%;
  padding: 20px;
}

.box_title {
  font-family: Arial, sans-serif;
  font-size: 18px;
  font-weight: bold;
  text-align: center;
  margin: 15px 0px;
}

.bill-information {
  border: 1px solid #ddd;
  padding: 15px;
  margin-bottom: 20px;
}

.bill-table {
  border: 1px solid #ddd;
  padding: 15px;
}

.bill-table td {
  padding: 5px;
  text-align: center;
}

    </style>
<?php
if (isset($donhang) && is_array($donhang)) {
    extract($donhang);

    // Gán giá trị cho các biến ngaydathang và tongtien
    $ngaydathang = $donhang[0]['ngaydathang'];
    $tongtien = 0;
    foreach ($donhang as $item) {
        $tongtien += $item['price'] * $item['soluong'];
    }
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
            <h3 class="box_title">Thông tin đặt hàng</h3>
            <div class="box-bill" style="min-height: 20px;">
                <p>Người dùng: <?= $name ?></p>
                <p>Địa chỉ: <?= $address ?></p>
                <p>Email: <?= $email ?></p>
                <p>Số điện thoại: <?= $phone ?></p>
                <p>Phương thức thanh toán: <?= $donhang[0]['pttt'] === 0 ? "Chuyển khoản" : "Thanh toán khi giao hàng" ?></p>
                <p>Ngày đặt hàng: <?= $ngaydathang ?></p>
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
                  foreach ($donhang as $item) {
                    extract($item);
                    echo '<tr>
                        <td style="padding: 10px"><img src="view/images/' . $image . '" width="120px"/></td>
                        <td style="padding: 10px">' . $name . '</td>
                        <td style="padding: 10px">' . $price . 'đ</td>
                        <td style="padding: 10px">' . $soluong . ' </td>
                        <td style="padding: 10px">' . $ngaydathang . ' </td>
                        <td style="padding: 10px">' . ($pttt === 0 ? "Chuyển khoản" : "Thanh toán khi giao hàng") . ' </td>
                    </tr>';
                  }                
                    ?>
                </table>

                <?php
                $tong = 0;
                foreach ($donhang as $item) {
                    $tong += $item['price'] * $item['soluong'];
                }
                echo "<h3 style='margin: 15px 0px'>Tổng số tiền: " . $tong . "đ</h3>";
                ?>
            </div>
        </div>
    </div>
</main>