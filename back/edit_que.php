<?php
$row = $News->find($_GET['id']);
$types = $Type->all();
$type_dict = [];
foreach ($types as $type) {
    $type_dict[$type['id']] = $type['type'];
}

?>
<div class="login-main">
    <div class="login-div" style="width:600px; height:600px ;margin-top: 40px;">
        <!-- <div class="log"><i class='bx bx-user-circle'></i></div> -->
        <div class="fields">
            <form action="./api/save_news.php" method="post" enctype="multipart/form-data">
                <div style="display: flex; height: 70px;">
                    <div style="margin-top:2%;; width: 10%;">
                        分類
                    </div>
                    <div class="username" style="width:40%;">
                        <select name="type" id="type">
                            <?php foreach ($types as $type) { ?>
                                <option value="<?= $type['id']; ?>" <?= $type['id'] == $row['type'] ? "selected" : "" ?>><?= $type['type']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div style="margin:2% ;text-align: center;; width: 10%;">
                        罝頂
                    </div>
                    <div class="username" style="width:10%;">
                        <input type="checkbox" name="top" id="checkbox" value="1" <?= ($row['top'] == 1) ? 'checked' : ''; ?>>
                    </div>
                    <div style="margin:2% ;text-align: center;; width: 10%;">
                        顯示
                    </div>
                    <div class="username" style="width:10%;">
                        <input type="checkbox" name="sh" id="checkbox" value="1" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                    </div>
                </div>
                <div style="display: flex;">
                    <div style="margin-top:4%;width: 10%;">標題</div>
                    <div class="username">
                        <input type="text" class="user-input" style="width: 470px; padding: 20px 10px 20px 30px; font-size: 16px;" name="title" value='<?= $row['title']; ?>'>
                    </div>
                </div>
                <div style="display: flex;">
                    <div style="margin-top:4%;width: 10%">內容</div>
                    <div class="username">
                        <textarea name="text" id="text" cols="48" rows="8" style="width: 440px;"><?= $row['text']; ?></textarea>

                    </div>
                </div>
                <div style="display: flex;">
                    <div style="margin-top:4% ;width: 15%;">更換圖片</div>
                    <input type="file" name="img">
                    

                </div>
                <div class="btn">
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <input class="signin-button login" type="submit" value="submit" id="edit_user">
                    <input class="signin-button reset" type="reset" value="reset">

                </div>

            </form>

        </div>




    </div>
</div>