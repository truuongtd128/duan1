<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="view/css/css/dangki.css">
<!-- <link rel="stylesheet" href="view/css/css/bill.css"> -->

<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/cart.php";
include "model/binhluan.php";
include "model/donhang.php";
include "anh.php";


if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
if(isset($_SESSION["user"])){
    extract($_SESSION['user']);
}
$sp = all_sanpham();
$dsdm = loadall_danhmuc();
include "view/header.php";
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];

    switch ($act) {
        case 'men':
            $spnam=sanphamnam();
            include "view/men.php";
            break;
        case 'wommen':
                $spnu=sanphamnu();
                include "view/wommen.php";
                break;
                case 'sanpham':
                    $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : "";
                    $danhmuc = isset($_POST['danhmuc']) ? $_POST['danhmuc'] : "";
                    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : "";
                    $giatoithieu = isset($_POST['giatoithieu']) ? $_POST['giatoithieu'] : "";
                    $giatoida = isset($_POST['giatoida']) ? $_POST['giatoida'] : "";
            
                    $dssp = loadall_sanpham($kyw, $danhmuc, $giatoithieu, $giatoida, $gioitinh);
                    $tendm = load_ten_dm($danhmuc);
                    include "view/sanpham.php";
                    break;
             
        case 'sanphamct':
            if ((isset($_GET['idsp'])) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
                include "view/sanphamchitiet.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'dangki':
            if (isset($_POST['dangki']) && ($_POST['dangki'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                // $roll = $_POST['roll'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                insert_taikhoan($user, $pass, $email,$address,$phone);
                $thongbao = "bạn đã đăng kí thành công !";
                header("Location: index.php?act=dangnhap");
            }
            include "view/taikhoan/dangki.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;

                    // $thongbao="bạn đã đăng nhập thành công !";
                    header('location:index.php');
                } else {
                    $thongbao = "tài khoản không tồn tại.";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;

            case 'edit':
               
            if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                $pass = $_POST['pass'];
                $user= $_POST['user'];
                $address= $_POST['address'];
                $phone= $_POST['phone'];
                
                $email = $_POST['email'];
                $id = $_POST['id'];
                update_taikhoan($id,$user,$pass, $email,$address,$phone);
                
                $_SESSION['user'] = checkuser($user, $pass);
               
                header('location: index.php?act=dangnhap');
            }
            include "view/taikhoan/edit.php";
            break;


        case 'quenmk':
            if (isset($_POST['gui']) && ($_POST['gui'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "mật khẩu của bạn là : " . $checkemail['pass'];
                } else {
                    $thongbao = "email này không tồn tại !";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'thoat':
            session_unset();
            header('location: index.php');
        case 'addtocard':
            if(isset($_POST['addtocart']) && $_POST['addtocart']){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $image = $_POST['image'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'];
                $tien = $soluong * $price;
                $giohang = [$id,$name,$image,$price,$tien,$soluong];
                // array_push($_SESSION['mycart'],$giohang);
                if (isset($_SESSION['mycart'])) {
                    $cartItems = $_SESSION['mycart'];
                    $exis = null;
                    foreach ($cartItems as $key => $item) {
                        if ($item[0] == $id) {
                            $exis = $key;
                            break;
                        }
                    }
                }  
                if ($exis !== null) {
                    // Nếu sản phẩm đã tồn tại, tăng số lượng
                    $cartItems[$exis][4] += $tien; // Cập nhật tổng tiền
                    $cartItems[$exis][5]++; // Tăng số lượng
                } else {
                    // Nếu sản phẩm chưa tồn tại, thêm mới sản phẩm vào giỏ hàng
                    array_push($cartItems, $giohang);
                }  
                $_SESSION['mycart'] = $cartItems;
            }
            include "view/cart/giohang.php";
            break;

        case 'delcart':
            if(isset($_GET['id'])){
                array_splice($_SESSION['mycart'],$_GET['id'],1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header("Location: index.php?act=addtocard");
            break;

        case 'bill' :
            $donhang= null;
                $giohang= null;
                if(isset($_POST['dathang'])){
                    $name=$_POST['name'];
                    $address=$_POST['address'];
                    $phone=$_POST['phone'];
                    $email=$_POST['email'];
                    $ngaydathang = date('Y-m-d H:i:s');
                    $soluong=count($_SESSION['mycart']);
                    $pttt = $_POST['pttt'];
                    

                    $iddathang= insert_donhang($name,$address,$email,$phone,$soluong,$ngaydathang,$pttt);
                    
                    $donhang = loadone_donhang($iddathang);
                    $giohang = loadCart($iddathang);
                    foreach ($_SESSION['mycart']as $cart ) {
                        $soluong = $cart[5]; // Số lượng từ giỏ hàng
                        insert_giohang($iddathang,$cart[0],$_SESSION['user']['id'],$cart[2],$cart[1],$cart[3],$cart[5]);
                        // $soluong += $cart[5];
                    }
                    
                  $giohang = loadCart($_SESSION['user']['id']);
                    $_SESSION['mycart'] = [];
                    header("Location: index.php?act=dathang"); 
                 }
                 
                $donhang = loadHoaDonUser($_SESSION['user']['id']);
                $giohang = loadCart($_SESSION['user']['id']);
            include "view/cart/bill.php";
            break;


        case 'dathang' :
            $donhang = loadHoaDonUser($_SESSION['user']['id']);
            $giohang = loadCart($_SESSION['user']['id']);
            include "view/cart/hoadon.php";
           
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}




include "view/footer.php";
