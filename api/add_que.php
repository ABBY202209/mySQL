<?php
include_once "base.php";

//送來的subject不能是空的
if (isset($_POST['subject']) && $_POST['subject']!='') {
    # code...
    $Que->save(['text'=>$_POST['subject'],'count'=>0,'parent'=>0]);
    
    //如果parent是0是主題；有數字是主題的id
    $parent=$Que->max('id');
    foreach ($_POST['option'] as $opt) {
        # code...
    $Que->save(['text'=>$opt,'count'=>0,'parent'=>$parent]);

    }
}
to("../back.php?do=que");