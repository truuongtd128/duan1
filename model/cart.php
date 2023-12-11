<style>
    .inner-item {
        background-color:#AAAAAA;
        color: red;
    }
   
</style>
<?php
function viewCart($delete){
    $i = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        global $img_path;
        $anh = $img_path.$cart[2];
       if($delete === 1){
        $xoa = 'index.php?act=delcart&id='.$i.'';
       } else {
        $xoa = "";
       }
       echo '<div class="inner-item">
       <div class="inner-item-name">
           <img src='.$anh.' alt=""/>
           <div class="inner-item-name-price">
           <strong><h3>'.$cart[1].'</h3></strong>
           <p>Giá: '.$cart[3].'đ</p>
           </div>
       </div>
       <h2>Số lượng:
       <div class="quantity-cart">
           <input type="number" name="soluong" class="count" value="'.$cart[5].'">
       </div>
   </h2>
       <a href='.$xoa.'><i class="fa-solid fa-trash"></i></a>
   </div>';
   $i += 1;
   }
}

function insert_giohang($iddonhang,$id_sp,$iduser,$image,$name,$price,$soluong){
$sql="INSERT into giohang values(null,'$iddonhang','$iduser','$image','$name','$price','$soluong','$id_sp')";

return pdo_execute($sql);
}

function loadCart($iddonhang){
    $sql = "SELECT * FROM giohang WHERE iddonhang = $iddonhang";
    $giohang = pdo_query($sql);
    return $giohang;
}


function loadHoaDonUser($id)
{
    $sql = "SELECT giohang.id, giohang.iddonhang,
    giohang.id_sp, giohang.name, giohang.image, giohang.price,
    giohang.soluong,donhang.pttt, donhang.ngaydathang FROM giohang
    LEFT JOIN donhang ON giohang.iddonhang = donhang.id
    WHERE iduser = $id ORDER BY donhang.id DESC LIMIT 1";
    $giohang = pdo_query($sql);
    return $giohang;
}
function loadAllHoaDonUser($id)
{
    $sql = "SELECT giohang.id, giohang.iddonhang,
    giohang.id_sp, giohang.name, giohang.image, giohang.price,
    giohang.soluong,donhang.pttt, donhang.ngaydathang FROM giohang
    LEFT JOIN donhang ON giohang.iddonhang = donhang.id
    WHERE iduser = $id ORDER BY donhang.id DESC";
    $giohang = pdo_query($sql);
    return $giohang;
}
function loadall_thongke(){
        $sql="select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice"; 
        $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm ";
        $sql.=" group by danhmuc.id order by danhmuc.id desc";
        $listtk=pdo_query($sql);
        return $listtk;
    }

?>