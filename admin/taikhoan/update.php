
<div class="row2">
         <div class="row2 font_title">
          <h1>CẬP NHẬT TÀI KHOẢN</h1>
         </div>
         <div class="row2 form_content ">
         <form action="index.php?act=updatetk" method="POST" enctype="multipart/form-data">
           <div class="row2 mb10 form_content_container">
           <!-- <select name="iddm">
                <option value="0" seclection>Tất cả</option> 
            </select> -->
           </div>
            <?php
            if(is_array($taikhoan)){
                extract($taikhoan);
            }
            ?>
           <div class="row2 mb10">
            <label>Tên đăng nhập</label> <br>
            <input type="text" name="user" value="<?=$user?>"required>
           </div>
           <div class="row2 mb10">
            <label>Mật khẩu</label> <br>
            <input type="text" name="pass" value="<?=$pass?>"required>
           </div>
           <div class="row2 mb10">
            <label>Email</label> <br>
            <input type="text" name="email" value="<?=$email?>"required>
           </div>
           <div class="row2 mb10">
            <label>địa chỉ</label> <br>
            <input type="text" name="address" value="<?=$address?>" required>
           </div>
           <div class="row2 mb10">
            <label>Số điện thoại</label> <br>
            <input type="text" name="phone" value="<?=$phone?>" required>
           </div>
           <div class="row2 mb10">
            <input type="text" name="roll" value="<?=$roll?>" hidden>
           </div>
           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?=$id?>">
         <input class="mr20" type="submit" name="capnhat" value="Cập nhật">
         <input  class="mr20" type="reset" value="Nhập lại">

         <a href="index.php?act=dstk"><input  class="mr20" type="button" value="Danh sách"></a>
           </div>
           <?php 
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
           ?>
          </form>
         </div>
        </div>
    </div>