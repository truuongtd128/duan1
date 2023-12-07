<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH TÀI KHOẢN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ TK</th>
                <th>Tên Đăng Nhập</th>
                <th>Mật Khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>SỐ Điện THoại</th>
                <th>Vai Trò</th>
                <th>Hành Động</th>
                
            </tr>
            <?php
                foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    $vaitro=$taikhoan['roll'];
                    $a="";
                    if($vaitro==0){
                        $a="nhân viên";
                    }else if($vaitro==1){
                        $a="Khách hàng";
                    }
                    $suatk="index.php?act=suatk&id=".$id;
                    $xoatk="index.php?act=xoatk&id=".$id;
                    echo '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.$id.'</td>
                            <td>'.$user.'</td>
                            <td>'.$pass.'</td>
                            <td>'.$email.'</td>
                            <td>'.$address.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$a.'</td>
                            <td>
                            <a href="'.$suatk.'"><input type="button" value="Sửa"></a>
                            <a href="'.$xoatk.'"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>';
                }
            ?>
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
<!-- <a href="index.php?act=adddm"> <input  class="mr20" type="button" value="NHẬP THÊM"></a> -->
           </div>
          </form>
         </div>
        </div>