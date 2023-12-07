<?php
function insert_binhluan($noidung,  $iduser,$id_sp, $ngaybinhluan) {
    $sql="insert into binhluan(noidung, iduser,id_sp,ngaybinhluan) values('$noidung','$iduser','$id_sp','$ngaybinhluan')";
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    pdo_execute($sql);
}
function loadbl($id_sp ) {
    $sql = "SELECT binhluan.noidung, binhluan.ngaybinhluan, taikhoan.user
            FROM binhluan
            JOIN taikhoan ON binhluan.iduser = taikhoan.id";
    if ($id_sp !== null) {
        $sql .= " WHERE binhluan.id_sp = '".$id_sp."'";
    }
    $sql .= " ORDER BY binhluan.id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
// function loadall_binhluan($id_sp) {
//     $sql= "select * from binhluan where 1";
//     if($id_sp>0) 
//     $sql.="  AND id_sp= '".$id_sp."'";
//     $sql.=" order by id desc";
//     $listbl=pdo_query($sql);
//     return  $listbl;
// }
function all_binhluan(){
    $sql = "select * from binhluan where 1 order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function delete_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}
?>