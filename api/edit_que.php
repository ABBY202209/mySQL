<?php 
include_once "base.php";
dd($_POST);
// dd($News->all());
if (isset($_POST['id'])) {
    # code...
    foreach ($_POST['id'] as $id) {
        # code...
        if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
            # code...
            $News->del($id);
        }else{
            $row=$News->find($id);
            // dd($row);
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            echo $row['sh'];
            $News->save($row);
        }

    }
    
}
// to("../back.php?do=news");
