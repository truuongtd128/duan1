<style>
    .pay {
  margin: 20px;
}

.pay-form {
  background-color: #f2f2f2;
  padding: 20px;
}

.bill h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.bill table {
  width: 100%;
  border-collapse: collapse;
}

.bill table td {
  padding: 10px;
}

.bill table .p-2 {
  width: 100px;
}

.bill table img {
  height: 180px;
}

h3 {
  font-size: 18px;
  margin-bottom: 10px;
}

.pay-label {
  margin-bottom: 10px;
}

.pay-label label {
  display: block;
  margin-bottom: 5px;
}

.pay-label input {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
}

.confirm-pay {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

.confirm-pay:hover {
  background-color: #45a049;
}
</style>
<div class="pay">
    <div class="pay-form">
      <div class="bill">
            <h1>Thông tin đơn hàng</h1>
            <table class="table-bordered" border="1">
                <tr>
                    <td class="p-2" style="width: 100px;">STT</td>
                    <td class="p-2" style="width: 200px;">Ảnh</td>
                    <td class="p-2" style="width: 200px;">Tên sản phẩm</td>
                    <td class="p-2" style="width: 100px;">Giá</td>
                    <td class="p-2" style="width: 100px;">Số lượng</td>
                    <td class="p-2" style="width: 100px;">Tổng tiền</td>
                </tr>
                <?php 
                $i = 0;
                $tong = 0;
                 foreach ($_SESSION['mycart'] as $cart) {
                    // $cartt=array_values($cart);
                    // print_r($cart);
                 
                  $tong = $cart[3]*$cart[5];
                    $image = $img_path.$cart[2].'';
                    echo '<tr class="p-4">
                    <td class="p-2">'.$i.'</td>
                    <td class="p-2"><img src='.$image.' height="180px"/></td>
                    <td class="p-2">'.$cart[1].'</td>
                    <td class="p-2">'.$cart[3].'đ</td>
                    <td class="p-2">'.$cart[5].'</td>
                    <td class="p-2">'.$tong.'</td>
                    </tr>
                    ';
                    $i += 1;
                    
                    
                }
                 ?>
            </table>
        </div>
        <br>
        <h3>thông tin khách hàng</h3>
        <form action="index.php?act=bill" method="POST">
            <div class="pay-label">
                <label for="card-number">Tên khách hàng</label>
                <input type="text" name="name" value="<?=$user?>" required>
            </div>
            <div class="pay-label">
                <label for="card-number">Địa chỉ</label>
                <input type="text" name="address" value="<?=$address?>" required>
            </div>
            <div class="pay-label">
                <label for="card-number">Email</label>
                <input type="text" name="email" value="<?=$email?>" required>
            </div>
            <div class="pay-label">
                <label for="card-number">Số điện thoại</label>
                <input type="text" name="phone" value="<?=$phone?>" required>
            </div>
            <div class="pay-label">
                <label for="card-number">Hình thức thanh toán</label>
                <div class="payment_methods">
                    <div class="payment_method">
                        <input value="0" name="pttt" type="radio" checked>
                        <label>Chuyển khoản trực tiếp</label>
                    </div>
                    <div class="payment_method">
                        <input value="1" name="pttt" type="radio">
                        <label>Thanh toán khi giao hàng</label>
                    </div>
                </div>
            <input class="confirm-pay" type="submit" name="dathang" value="đặt hàng">
        </form>
        
    </div>
</div>

