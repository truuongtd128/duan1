<main class="form-dk">
    <div class="form-container">
      <div class="box_title"><h1>Đăng kí Tài khoản</h1></div>
      <div class="box_content form_account">
        <form action="index.php?act=dangki" method="post">
          <div>
            <label>Tên đăng nhập</label>
            <input type="text" name="user"  placeholder="nhập tên đăng nhập" required>
          </div>
          <div>
          <label>Mật Khẩu</label>
          <input type="password" name="pass"  placeholder="password" required>
          </div>
          <div>
          <label>Email</label>
            <input type="email" name="email" placeholder="email" required>
          </div>
          <div>
          <div>
          <label>số điẹn thoại</label>
            <input type="number" name="phone" placeholder="phone" required>
           
          </div>
          <div>
          <label>địa chỉ</label>
            <input type="text" name="address" placeholder="address" required>
          </div>
          
          <input type="submit" value="Đăng kí" name="dangki">
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