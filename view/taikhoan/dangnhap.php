<main class="form-dk">
    <div class="form-container">
      <div class="box_title"><h1>Đăng Nhập</h1></div>
      <div class="box_content form_account">
        <form action="index.php?act=dangnhap" method="post">
                  <?php
                     if(isset($_SESSION['user'])){
                        extract($_SESSION['user']);
                  ?> 
                     <h4>Xin Chào <?=$user?></h4><br>
                     <span><h3><a href="index.php?act=quenmk">Quên Mật Khẩu</a></h3></span>
                     <span><h3><a href="index.php?act=edit">Cập nhập tài khoản</a></h3></span>
                     <?php if($roll==1){?>
                     <span>
                      <h3>
                      <a href="admin/index.php">Đăng nhập admin</a>
                     </h3>
                     </span>
                     <?php }?>
                     <span><h3><a href="index.php?act=thoat">Đăng xuất</a></h3></span>
                  <?php     
                     }else{
                  ?>
          <div>
            <label>Tên đăng nhập</label>
            <input type="text" name="user"  placeholder="nhập tên đăng nhập" required>
          </div>
          <div>
          <label>Mật Khẩu</label>
          <input type="password" name="pass"  placeholder="password" required>
          </div>
          <div>
          <input type="submit" value="Đăng nhập" name="dangnhap">
          <br>
          <input type="reset" value="Nhập lại">
          <br>
          <span><h3>Bạn chưa có tài khoản ? <a href="index.php?act=dangki">Đăng Kí</a></h3></span>
          <!-- <span><h3><a href="index.php">Quay lại trang chủ</a></h3></span> -->
          <span><h3><a href="index.php?act=quenmk">Quên mật khẩu</a></h3></span> 
          <?php }?>
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