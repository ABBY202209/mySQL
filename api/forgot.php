<?php
include_once "base.php";
$user=$User->find(['email'=>$_GET['email']]);

if (!empty($user)) {
    # code...
    echo "<i class='bx bx-key' ></i>";
    echo "您的密碼為：".$user['pw'];
    
}else{
    echo "<i class='bx bxs-message-rounded-x' style='color:#D95959 ;'></i>";
    echo "查無此資料";
}