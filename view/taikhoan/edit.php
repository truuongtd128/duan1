<?php
if(isset($_SESSION['user'])){
  $user = $_SESSION['user']['user'];
  $address = $_SESSION['user']['address'];
  $email = $_SESSION['user']['email'];
  $phone = $_SESSION['user']['phone'];
  $id   = $_SESSION['user']['id'];
} else {
  $user = "";
  $address = "";
  $email = "";
  $phone = "";
  $id = "";

}
?>
<main class="form-dk">
    <div class="form-container">
      <div class="box_title"><h1>Cập nhật tài khoản</h1></div>
      <div class="box_content form_account">
        <form action="index.php?act=edit" method="post">
        <div>
          <!-- <label>Tên tài khoản</label> -->
          <input type="text" name="user"  value="<?=$user?>"hidden>
          </div>
          <div>
          <label>Mật Khẩu</label>
          <input type="text" name="pass"  value="<?=$pass?>" required>
          </div>
          <div>
          <label>Email</label>
            <input type="email" name="email" value="<?=$email?>" required>
          </div>
          <div>
          <label>Địa chỉ</label>
            <input type="text" name="address" value="<?=$address?>" required >
          </div>
          <div>
          <label>Số Điện Thoại</label>
            <input type="text" name="phone" value="<?=$phone?>" required >
          </div>
          
          
          <div>
             <input type="hidden" name="id" value="<?=$id?>">
          </div>
          <input type="submit" value="cập nhập" name="capnhap">
          <br>
          <input type="reset" value="Nhập lại">
          <br>
        </form>
        <h3 class="tb">
        <?php
        if(isset($thongbao)&&($thongbao!="")){
          echo $thongbao;
        }
        ?>
        </h3>
      </div>
    </div>
  </main>