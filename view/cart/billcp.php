<style>
    .thank-you-title {
        font-size: 44px;
        color: #333;
        margin-bottom: 20px;
    }

    .order-info-title {
        font-size: 38px;
        color: #555;
        margin-bottom: 10px;
    }

    .order-info-table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-info-table td {
        padding: 5px 10px;
        border: 1px solid #ccc;
    }

    .order-info-table .label {
        font-weight: bold;
    }

    .order-details-title {
        font-size: 28px;
        color: #555;
        margin-bottom: 10px;
    }

    .order-details-table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-details-table th,
    .order-details-table td {
        padding: 5px 10px;
        border: 1px solid #ccc;
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
?>
<h1 class="thank-you-title">Cảm ơn bạn đã đặt hàng</h1>

<div class="thongtin">
    <h1 class="order-info-title">Thông tin đặt hàng</h1>
    <table class="order-info-table">
        <tr>
            <td class="label">Người đặt hàng</td>
            <td><?=$user?></td>
        </tr>
        <tr>
            <td class="label">Địa chỉ</td>
            <td><?=$address?></td>
        </tr>
      
        <tr>
            <td class="label">Email đặt hàng</td>
            <td><?=$email?></td>
        </tr>
        <tr>
            <td class="label">Số điện thoại đặt hàng</td>
            <td><?=$phone?></td>
        </tr>
        <tr>
            <td class="label">Ngày đặt hàng</td>
            <td><?=$ngaydathang?></td>
        </tr>
        <tr>
            <td class="label">Tổng tiền</td>
            <td><?=$tongtien?></td>
        </tr>
    </table>

    <div class="chitiet">
    <h1 class="thank-you-title">Cảm ơn bạn đã đặt hàng</h1>



    <div class="chitiet">
        <h1 class="order-details-title">Chi tiết đơn hàng</h1>
        <table class="order-details-table">
        <tr>
          <td>Hình</td>
          <td>Sản phẩm</td>
          <td>Đơn giá</td>
          <td>Số lượng</td>
          <td>Ngày đặt hàng</td>
          <td>Phương thức thanh toán</td>
        </tr>
            
        <?php
            foreach ($donhang as $value) {
                extract($value);
                // $img_path="view/images/";
                echo '<tr>
                <td style="padding: 10px"><img src="view/images/'.$image.'" width="120px"/></td>
                <td style="padding: 10px">'.$name.'</td>
                <td style="padding: 10px">'.$price.'đ</td>
                <td style="padding: 10px">'.$soluong.' </td>
                <td style="padding: 10px">'.$ngaydathang.' </td>
               
                
                </tr>';
            } 
            viewCart(1);
        ?>
        </table>
    </div>
</div>
       
</div>
      


    </div>
</div>