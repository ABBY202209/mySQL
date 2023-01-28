<?php include_once 'base.php';

$chk=$User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if ($chk>0) {
    # code...
    echo $chk;
    $_SESSION['login']=$_POST['acc']; //如果想同時取id 和帳號，就要使用陣列來處理
}else{
    echo $chk;
}