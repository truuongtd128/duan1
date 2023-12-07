<?php 
    include "../MODEL/pdo.php";
    include "../MODEL/danhmuc.php";
    include "../MODEL/sanpham.php";
    include "header.php";
    include "../MODEL/taikhoan.php";
    include "../MODEL/cart.php";
    include "../MODEL/binhluan.php";
    include "../MODEL/donhang.php";
    //controller

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act) {
            case 'adddm';
            //kiểm tra xem người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    var_dump($tenloai);
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
    
                }
                
                include "danhmuc/add.php";
                break;
            case 'listdm';
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $dm=loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_danhmuc($id,$tenloai);
                    $thongbao="Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
                
            /* Contronler cho sản phẩm */

            case 'addsp';
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $gioitinh=$_POST['gioitinh'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $filename=$_FILES['hinh']['name'];
                    $target_dir = "../view/images/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                    
                        insert_sanpham($tensp,$giasp,$filename,$mota,$iddm,$gioitinh);
                        $thongbao="Thêm thành công";
                    
                    }

                    // insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
                    // $thongbao="Thêm thành công";

                
                $listdanhmuc=loadall_danhmuc();
                //var_dump($listdanhmuc);
                include "sanpham/add.php";
                break;
            case 'listsp';
            if(isset($_POST['listok'])&&($_POST['listok'])){
                $kyw=$_POST['kyw'];
                $iddm=$_POST['iddm'];
            }else{
                $kyw='';
                $iddm=0;
            }
            $listdanhmuc=loadall_danhmuc();
            $listsanpham=loadall_sanpham($kyw,$iddm);
            include "sanpham/list.php";
            break;
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham=loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sanpham=loadone_sanpham($_GET['id']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/update.php";
                break;
            case 'updatesp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $id=$_POST['id'];
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $gioitinh=$_POST['gioitinh'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../view/images/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id,$tensp,$giasp,$hinh,$mota,$iddm,$gioitinh);
                    $thongbao="Cập nhật thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                $listsanpham=loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
                case 'dstk':
                    $listtaikhoan=loadall_taikhoan();
                    include "taikhoan/list.php";
                    break;
                case 'suatk':
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            $taikhoan=loadone_taikhoan($_GET['id']);
                        }
                        $listtaikhoan=loadall_taikhoan();
                        include "taikhoan/update.php";
                        break;
                case'updatetk':
                        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                            $id=$_POST['id'];
                            $user=$_POST['user'];
                            $pass=$_POST['pass'];
                            $email=$_POST['email'];
                            $address=$_POST['address'];
                            $phone=$_POST['phone'];
                            $roll=$_POST['roll'];
                            
                            update_taikhoan($id,$user,$pass,$roll, $email,$address,$phone);
                            $thongbao="Cập nhật thành công";
                        }
                        $listtaikhoan=loadall_taikhoan();
                        $listtaikhoan=loadall_taikhoan("",0);
                        include     "taikhoan/list.php";
                        break;
                case 'xoatk':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_taikhoan($_GET['id']);
                    }
                    $listtaikhoan=loadall_taikhoan("",0);
                    include "taikhoan/list.php";
                    break;
                case 'dsbl':
                        $listbl= all_binhluan();
                        include "binhluan/list.php";
                        break;
                case 'xoabl':
                    if(isset($_GET['id'])&&($_GET['id'])){
                        delete_binhluan($_GET['id']);
                    }
                        $listbl= all_binhluan() ;
                        include "binhluan/list.php";
                        break;
                case 'thongke':
                        $listthongke=loadall_thongke();
                        include "thongke/list.php";
                        break; 
                case 'bieudo' :
                        $listthongke=loadall_thongke();
                        include "thongke/bieudo.php";
                        break;
                case 'dsdh' :
                        $listdonhang=loadall_donhang();
                        include "giohang/list.php";
                        break;
                case 'suadh':
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                $dh=loadone_donhang($_GET['id']);
                            }
                            $listdonhang=loadall_donhang();
                            include "giohang/update.php";
                            break;
                case'updatedh':
                        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                            $id=$_POST['id'];
                            $id_sp=$_POST['id_sp'];
                            $price=$_POST['price'];
                            update_donhang($id,$id_sp,$price);
                            $thongbao="Cập nhật thành công";
                        }
                        $listdonhang=loadall_donhang();
                        $listdonhang=loadall_donhang("",0);
                        include     "giohang/list.php";
                        break;
                case 'xoadh':
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_donhang($_GET['id']);
                            }
                            $listdonhang=loadall_donhang("",0);
                            include "giohang/list.php";
                            break;
            default:
                include "home.php";
                break;
        }   

    }else{
        include "home.php";
    
    }
    include "footer.php";
?>