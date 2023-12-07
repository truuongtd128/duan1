<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";



$id_sp = $_REQUEST['id_sp'];

// $dsbl = loadall_binhluan($id_sp);
$loadbl = loadbl($id_sp);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
 .boxfooter {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 20%;
    background-color: #f2f2f2;
    padding: 10px;
    box-sizing: border-box;
  }

  .boxfooter form {
    display: flex;
    align-items: center;
  }

  .boxfooter input[type="text"] {
    flex-grow: 1;
    padding: 5px;
    margin-right: 20px;
  }

  .boxfooter input[type="submit"] {
    padding: 5px 10px;
    background-color: #337ab7;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  .login-notice {
    text-align: center;
    color: red;
    margin-top: 50px;
    font-size: large;
  }
  /* này là mới nè */
  .row.mb {
    margin-bottom: 20px;
  }

  .boxtitle {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .boxcontent2.binhluan table {
    width:500px;
    border-collapse: collapse;
  }

  .boxcontent2.binhluan table td {
    padding: 10px;
    border: 1px solid #ccc;
  }

  .boxcontent2.binhluan table .noidung {
    font-weight: bold;
  }

  .boxcontent2.binhluan table .id-sp {
    color: blue;
  }

  .boxcontent2.binhluan table .ngaybinhluan {
    color: green;
  }
  .full-width-iframe {
    width: 100%;
    height: 300px;
    border: none;
  }
  
  
  </style>
</head>

<body>
<div class="row mb">
  <div class="boxtitle"> </div>
  <div class="boxcontent2 binhluan">
    <table>
    <tr>
          <th>Nội dung</th>
          <th>Người bình luận</th>
          <th>Ngày Bình Luận</th>
         
        </tr>
      <?php
      foreach ($loadbl as $bl) {
        extract($bl);
        echo '<tr>';
        echo '<td><span class="noidung">' . $noidung . '</span></td>';
        echo '<td><span class="id-sp">' . $user.  '</span></td>';
        echo '<td><span class="ngaybinhluan">' . $ngaybinhluan . '</span></td>';
        echo '</tr>';
      }
      ?>
    </table>
  </div>
</div>
      
    </div>
    <?php
  if (isset($_SESSION['user'])) {
    // Hiển thị form bình luận chỉ khi người dùng đã đăng nhập
    echo '<div class="boxfooter binhluanform">';
    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
    echo '<input type="hidden" name="id_sp" value="' . $id_sp . '">';
    echo '<input type="text" name="noidung">';
    echo '<input type="hidden" name="ngaybinhluan" >';

    echo '<input type="submit" name="guibinhluan" value="Gửi bình luận">';
    echo '</form>';
    echo '</div>';

    // Xử lý khi người dùng gửi bình luận
    if (isset($_POST['guibinhluan'])) {
      $noidung = $_POST['noidung'];
      $id_sp = $_POST['id_sp'];
      $iduser = $_SESSION['user']['id'];
      $ngaybinhluan = date('Y-m-d H:i:s');
      insert_binhluan($noidung, $iduser, $id_sp, $ngaybinhluan);
      

      header("Location: " . $_SERVER['HTTP_REFERER']);
    }
  } else {
    // Hiển thị thông báo yêu cầu đăng nhập
    echo '<p class="login-notice">Vui lòng đăng nhập để bình luận.</p>';
  }
?>
</body>

</html>