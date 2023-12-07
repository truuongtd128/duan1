<?php

function all_sanpham()
{
    $sql = "select * from sanpham where 1 order by id desc limit 0,9 ";
    $listsp = pdo_query($sql);
    return $listsp;
}
function sanphamnam()
{
    $sql = "SELECT * FROM sanpham WHERE gioitinh = 'nam' ";
    $listsp = pdo_query($sql);
    return $listsp;
}
function sanphamnu()
{
    $sql = "SELECT * FROM sanpham WHERE gioitinh = 'nữ' ";
    $listsp = pdo_query($sql);
    return $listsp;
}
// function loadall_sanpham($kyw,$iddm){
//     $sql = "SELECT * FROM sanpham WHERE 1";
//     if($kyw!=""){
//         $sql.= " and name like '%".$kyw."%'";
//     }
//     if($iddm>0){
//         $sql.= " and iddm = '".$iddm."'";
//     }
//     $sql.=" ORDER BY id desc ";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
function loadall_sanpham($kyw, $danhmuc, $giatoithieu, $giatoida, $gioitinh)
{
    $sql = "SELECT * FROM sanpham WHERE 1";

    if (!empty($kyw)) {
        $sql .= " AND name LIKE '%" . $kyw . "%'";
    }

    if (!empty($danhmuc)) {
        $sql .= " AND iddm = '" . $danhmuc . "'";
    }

    if (!empty($giatoithieu) && is_numeric($giatoithieu)) {
        $sql .= " AND price >= " . $giatoithieu;
    }

    if (!empty($giatoida) && is_numeric($giatoida)) {
        $sql .= " AND price <= " . $giatoida;
    }

    if (!empty($gioitinh)) {
        $sql .= " AND gioitinh = '" . $gioitinh . "'";
    }

    $sql .= " ORDER BY id DESC";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_ten_dm($iddm){
    if($iddm>0){
        $sql = "SELECT * FROM danhmuc WHERE id =".$iddm; 
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
    
}
function delete_sanpham($id){
    $sql="delete from sanpham where id=".$id;
    pdo_execute($sql);
}
function loadone_sanpham($id){
    $sql = "SELECT * FROM sanpham WHERE id =".$id; 
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadone_sanphamchitiet($id_ctsp){
    $sql = "SELECT * FROM chitietsp WHERE id_ctsp =".$id_ctsp; 
    $spct = pdo_query_one($sql);
    return $spct;
}
function load_sanpham_cungloai($id,$iddm){
    $sql = "SELECT * FROM sanpham WHERE iddm = ".$iddm." AND id <> ".$id; 
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function insert_sanpham($tensp,$giasp,$filename,$mota,$iddm,$gioitinh){
    $sql= "INSERT INTO `sanpham`(`id`, `name`, `price`, `image`, `mota`, `iddm`, `gioitinh`) VALUES (null,'.$tensp.','.$giasp','.$filename','.$mota','.$iddm','.$gioitinh')";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function update_sanpham($id,$tensp,$giasp,$hinh,$mota,$iddm,$gioitinh){
    if($hinh!=""){
        $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."',	mota='".$mota."',image='".$hinh."',gioitinh='".$gioitinh."' where id=".$id;
    }else{
        $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."',	mota='".$mota."',gioitinh='".$gioitinh."' where id=".$id;
    }
    
    pdo_execute($sql);
}



?>