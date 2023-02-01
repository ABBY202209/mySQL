<?php
include "base.php";
$table=$_POST['table'];
$data=[];

// $img
if (!empty($_FILES['img']['tmp_name'])) { //empty檢查是否為空值 ! not 
    # code...
    //move_uploaded_file 將上傳的文件移動到新的位置
    // tmp_name預設
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];//$_FILES 上傳檔案名稱;如果$data這個空陣列有img，那它就是上傳檔案的名稱
}

switch ($table) {
    case "Admin":
        # code...
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
        break;
        case "Menu":
            # code...
            $data['name']=$_POST['name'];
            $data['href']=$_POST['href'];
            $data['sh']=1;
            $data['parent']=0;

        break;
    
    default:
        # code...$text
        if (isset($_POST['text'])) {//如果有text
            # code...
            $data['text']=$_POST['text'];//就加進來
        }
        $data['sh']=($table=="Title")?0:1;//只有title的sh是單選，所以如果是title的話預設0，餘都是1
    }      



//存取
$$table->save($data);
//導回
to('../back.php?do='.lcfirst($table));