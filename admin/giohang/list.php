<div class="row2">
         <div class="row2 font_title mb">
          <h1>DANH SÁCH ĐƠN HÀNG</h1>
         </div>
         <!-- <form action="index.php?act=listsp" method="post">
                <input type="text" name="kyw">
                <select name="iddm">
                <option value="0" seclection>Tất cả</option>
                </select>
                <input type="submit" name="listok" value="GO">
        </form> -->
        <br>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
            
           <table>
            <tr>
                <th></th>
                <th>ID ĐƠN Hàng</th>
                <th>Tên sản phẩm</th>
                <th>TÊN người mua</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>GIÁ</th>
                <th>Số lượng</th>
                <th>Ngày Đặt</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
            <?php
                foreach ($listdonhang as $donhang) {
                    extract($donhang);
                    // $suadh="index.php?act=suadh&id=".$id;
                    $xoadh="index.php?act=xoadh&id=".$id;
                    echo '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$user.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$email.'</td>
                            <td>'.$price.'</td>
                            <td>'.$soluong.'</td>
                            <td>'.$ngaydathang.'</td>
                            <td>
                            
                            <a href="'.$xoadh.'"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>';
                }

            ?>
            
            
           </table>
           </div>
           <div class="row mb10 ">
         <!-- <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
<a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a> -->
           </div>
          </form>
         </div>
        </div>