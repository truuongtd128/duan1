<?php
    function insert_taikhoan($user, $pass,$email,$address,$phone){
        $sql = "INSERT INTO `taikhoan` (`user`,`pass`,`email`,`address`,`phone`) VALUES ('$user', '$pass','$email','$address','$phone'); ";
        
        pdo_execute($sql);
    }
   

    function loadall_taikhoan(){
        $sql="select * from taikhoan order by id desc";
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }

    function loadone_taikhoan($id){
        $sql="select * from taikhoan where id=".$id;
        $listtaikhoan = pdo_query_one($sql);
        return $listtaikhoan;
    }

    function checkuser($user, $pass){
        $sql="SELECT * FROM taikhoan WHERE user='".$user."' AND pass='".$pass."'";
      
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function update_taikhoan($id,$user,$pass, $email,$address,$phone){
        $sql="UPDATE taikhoan SET user='".$user."' ,pass='".$pass."', email='".$email."',address='".$address."',phone='".$phone."'  where id=".$id;
    //    var_dump($sql);
    //    die();
        pdo_execute($sql);
    }
    function delete_taikhoan($id){
        $sql="delete from taikhoan where id=".$id;
        pdo_execute($sql);
    }
    
    function dangxuat(){ 
            unset($_SESSION['user']); 
    }
    function checkemail($email){
        $sql="SELECT * FROM taikhoan WHERE email='".$email."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

?>