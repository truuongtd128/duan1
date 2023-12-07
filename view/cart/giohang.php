<style>
  .shopping-cart {
  width: 1300px;
  margin: auto;
  margin-top: 65px;
  margin-bottom: 65px;
  padding: 0px 15px;
}

h1 {
  color: #333;
}

.inner-cart {
  display: flex;
  justify-content: space-between;
}

.cart-block {
  border-bottom: 1px solid #e1e1e1;
}

.cart-block h1 {
  font-size: 24px;
  padding: 16px;
}

.item {
  width: 65%;
  margin-bottom: 20px;
  border: 1px solid #e1e1e1;
}

.item img {
  width: 125px;
  height: 140px;
  object-fit: cover;
}

.item h2 {
  color: #777;
  font-size: 21px;
}

.inner-item {
  display: flex;
  justify-content: space-between;
  padding: 16px;
}

.inner-item a {
  color: #000;
}

.inner-item-name {
  display: flex;
}

.inner-item-name-price {
  margin-left: 9px;
}

.quantity-cart input {
  border: none;
  outline: none;
}

.quantity-cart input::-webkit-inner-spin-button,
.quantity-cart input::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.quantity-cart-btn {
  background: transparent;
  border: none;
}

.total {
  width: 32%;
  border: 1px solid #e1e1e1;
  padding: 16px;
}

.total p {
  margin-bottom: 10px;
}

.total-block {
  display: flex;
  justify-content: space-between;
}

.total-buy {
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  width: 100%;
  height: 45px;
  text-align: center;
  background-color: #000;
  font-size: 16px;
  margin: 4px 2px;
  text-transform: uppercase;
  border-radius: 5px;
  transition: 0.3s;
}

.total-buy a {
  text-decoration: none;
  color: #fff;
}

.total-buy a:hover {
  opacity: 0.9;
  color: white;
}

@media screen and (max-width: 1300px) {
  .shopping-cart {
    max-width: 975px;
    margin: auto;
  }
}

</style>
<div class="shopping-cart">
    <div class="inner-cart">
        <div class="item">
           <div class="cart-block">
                <h1 style="background-color: #777;">Giỏ hàng</h1>
            </div>
            <?php 
            viewCart(1);
            ?>
        </div>
        <div class="total">
            <div class="total-block">
                <?php 
                $tong = 0;
                foreach ($_SESSION['mycart'] as $cart) { 
                $tong += $cart[4];
            }
            $tongSoLuong = 0;
            if (isset($_SESSION['mycart'])) {
                $cartItems = $_SESSION['mycart'];
            
                foreach ($cartItems as $cart) {
                    $tongSoLuong += $cart[5]; // Số lượng sản phẩm là phần tử thứ 3 trong mỗi mục
                }
            }
                echo '<strong><h3>Số lượng :'.$tongSoLuong.' </h3></strong>;
                <p>'.$tong.'</p>';
                 ?>
            </div>
            <div class="total-block">
                <p>Phí vận chuyển</p>
                <p>0đ</p>
            </div>
            <div class="total-block">
                <?php 
                $tong = 0;
                foreach ($_SESSION['mycart'] as $cart) { 
                $tong += $cart[4];
                }
                echo '<p>Tổng tiền</p>
                <p>'.$tong.'đ</p>';
                 ?>
            </div>
            <div class="total-buy">
                <a href="index.php?act=bill">Đồng ý đặt hàng</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>