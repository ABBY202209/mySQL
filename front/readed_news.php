<?php
$row = $News->find($_GET['id']);
$type = $Type->find($_GET['id']);
$row['type'] = $type['type'];


?>

<div>
    <div style="display: flex; height: 70px;width:600px">
        <div style="width: 10%;">
            分類：
        </div>

        <div class="username" style="width:30%;">
            <?= $row['type']; ?>
        </div>
        <div style="width: 10%;">
            日期：
        </div>
        <div class="username" style="width:30%;">
            <?= $row['created_at']; ?>
        </div>
        <div style="width: 10%;">
            人氣：
        </div>
        <div class="username" style="width:10%;">
            <?= $row['readed']; ?>
        </div>
    </div>
    <div style="display: flex; font-size:40px; font-weight:700; width:600px;">
        <?= $row['title']; ?>
    </div>
    <div style="display: flex;flex-direction: column;width:600px;">
        <div>
            <img src="./upload/<?= $row['img']; ?>" alt="" style="width:600px">
        </div>
        <div class="username"style="font-size:16px; font-weight:500">
            <?= $row['text']; ?>
        </div>

    </div>



</div>