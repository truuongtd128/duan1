<?php
    if(is_array($dh)){
        extract($dh);
    } 
    ?>
<div class="row2">
         <div class="row2 font_title">
          <h1>CẬP NHẬT ĐƠN HÀNG</h1>
         </div>
         <div class="row2 form_content ">
         <form action="index.php?act=updatedh" method="POST" enctype="multipart/form-data">
           <div class="row2 mb10 form_content_container">
           </div>
           <div class="row2 mb10">
            <label>ID sản phẩm</label> <br>
            <input type="text" name="id_sp" value="<?=$id_sp?>" required>
           </div>
           <div class="row2 mb10">
            <label>Giá</label> <br>
            <input type="text" name="price" value="<?=$price?>" required>
           </div>
           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?=$id?>">
         <input class="mr20" type="submit" name="capnhat" value="Cập nhật">
         <input  class="mr20" type="reset" value="Nhập lại">

         <a href="index.php?act=dsdh"><input  class="mr20" type="button" value="Danh sách"></a>
           </div>
           <?php 
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
           ?>
          </form>
         </div>
        </div>
    </div>