<?php
include_once "base.php";

if (isset($_POST['del'])) {
    # code...
    foreach ($_POST['del'] as $id ) {
        # code...
        $User->del($id);
    }
}

to("../back.php?do=admin");