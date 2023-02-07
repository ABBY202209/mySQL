<!-- 建置一個通用的edit，使用$$(可變變數)取出相對應的table，再switch使不同的表單跑不一的值 -->
<?php
include_once "base.php"; //include_once 只包含一次

dd($_POST);
//安全檢查
// if (isset($_POST['sh])) {
//     # code...
// }
//用switch 會變成new兩次 (base一次 )
// switch ($_POST['table']) {
//     case 'value':
//         # code...
//         $db=new DB('xxx');
//         break;

//     default:
//         # code...
//         break;
// }
//以前要重覆new DB；現在用可變變數就可以解決，無須重覆new DB
// $db=new DB($table);

$table = $_POST['table']; //寫這一行的可讀性會高一點
foreach ($_POST['id'] as $idx => $id) {
    # code...del sh text
    # 一次多筆資料：加判斷式，若無勾選del，就更新資料
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        # code...
        // $Title->del($id);
        $$table->del($id);
    } else {
        //更新
        // $row=$Title->find($id);
        $row = $$table->find($id);
        //針對不一樣的地方swtich
        switch ($table) {
            case "News":
                # code...
                $row['text'] = $_POST['text'][$idx];
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0; //判斷是否一樣的，如果是一樣的是1；不一樣的改0
                break;

            case "User":
                # code...
                $row['acc'] = $_POST['acc'][$idx];
                $row['pw'] = $_POST['pw'][$idx];
                break;

            case "Menu":
                # code...
                $row['name'] = $_POST['name'][$idx];
                $row['href'] = $_POST['href'][$idx];
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0; //因為已經改成sh[]，陣列要用in_array來做判斷
                break;

            default:
                # code...
                if (isset($_POTS['text'])) {
                    # code...
                    $row['text'] = $_POST['text'][$idx];
                }

                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0; //因為已經改成sh[]，陣列要用in_array來做判斷
                break;
        }

        // $Title->save($row);
        $$table->save($row);
        
    }
}
to("../back.php?do=" . lcfirst($table));