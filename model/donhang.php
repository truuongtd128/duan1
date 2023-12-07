<?php
// function loadall_donhang(){
//     $sql="SELECT * from donhang  order by id desc";
//     $listgiohang=pdo_query($sql);
//     return $listgiohang;
// }
function loadall_donhang(){
    $sql="SELECT * from donhang 
        JOIN giohang on donhang.id = giohang.id
        JOIN taikhoan on taikhoan.id = giohang.iduser";
    $listgiohang=pdo_query($sql);
    return $listgiohang;
}
function insert_donhang($name,$address,$email,$phone,$soluong,$ngaydathang,$pttt){
      
    $sql="INSERT INTO donhang VALUES(null,'$name','$address','$email','$phone','$soluong','$ngaydathang','$pttt')";
    // var_dump($sql);
    // die;
 
    return pdo_execute_return_lastInsertId($sql);
}
function loadone_donhang($id){
    $sql="select * from giohang where id=".$id;
    $listgiohang = pdo_query_one($sql);
    return $listgiohang;
}
function loadone_dh($id){
    $sql="select * from donhang where id=".$id;
    $listgiohang = pdo_query_one($sql);
    return $listgiohang;
}
function update_donhang($id, $id_sp, $price){
    $sql="UPDATE donhang SET id_sp='".$id_sp."', price='".$price."'  where id=".$id;
    pdo_execute($sql);
}
function delete_donhang($id){
    $sql="delete from taikhoan where id=".$id;
    pdo_execute($sql);
}
?>
