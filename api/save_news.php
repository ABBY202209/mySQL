<!-- 複製trailer -->
<?php
include_once "base.php";
dd($_POST);
$table = $_POST['table']; //寫這一行的可讀性會高一點

// 方法一：宣告一個變數為空陣列，用來暫存值用的
// $row=[];
// 方法二：利用$_POST傳值的方式來處理

//改成不是空的，才不會去更動到原本的圖片；因為去判斷在不在沒有意思，修改的資料一定在~ 
if (!empty($_FILES['img']['tmp_name'])) {
    # code...
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

if (empty($_POST['top'])) {
    # code...
    $_POST['top']=0;
}
if (empty($_POST['sh'])) {
    # code...
    $_POST['sh']=0;
}

//如果是編輯資料
if (!isset($_POST['id'])) {
    # code...
    $_POST['sh']=1;
   
}

$$table->save($_POST);


// to("../back.php?do=news");
// to("../back.php?do=" . lcfirst($table));

