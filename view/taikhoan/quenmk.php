<main class="form-dk">
    <div class="form-container">
      <div class="box_title"><h1>Quên Mật Khẩu</h1></div>
      <div class="box_content form_account">
        <form action="index.php?act=quenmk" method="post">
          <div>
            <label>Tên đăng nhập</label>
            <input type="text" name="user"  placeholder="nhập tên đăng nhập" required>
          </div>
          <div>
          <label>Email</label>
            <input type="email" name="email" placeholder="email" required>
          </div>
          <input type="submit" value="Gửi" name="gui">
          <br>
          <input type="reset" value="Nhập lại">
          <br>
          <span><h3><a href="index.php?act=dangnhap">Đăng nhập</a></h3></span>
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