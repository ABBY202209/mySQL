<?php
//頁數
$all = $Que->count(['sh' => 1],['parent'=>0]);
// dd($all);
$div = 5;
$pages = ceil($all / $div);
$now = $_GET['p'] ?? 1;
$start = ($now - 1) * $div;
// $rows = $Que->all(['type' => 1, 'sh' => 1], " limit $start,$div");
$rows = $Que->all(['sh' => 1,'parent'=>0], " limit $start,$div");

?>
<table>
    <tr>
        <th style="padding: 10px;">編號</th>
        <th style="padding: 10px;">主題</th>
        <th style="padding: 10px;">投票</th>
        <th style="padding: 10px;">查看結果</th>
    </tr>
    <?php
    foreach ($rows as $key => $row) {
    ?>
        <tr>
            <td style="width: 15%;text-align: center">
                <?= $key + 1; ?>
            </td>
            <td style="text-align:left;">
                    <?= $row['text']; ?>
            </td>
            <td style="width: 15%;text-align: center">
            <?php
                    if (isset($_SESSION['login'])) {
                        # code...
                        echo "<a href='index.php?do=readed_que&id={$row['id']}'><i class='bx bx-pointer'></i></a>";
                    }else{
                        echo "<a href='index.php?do=login'><i class='bx bx-log-in'></i></a>";
                    }
                ?>
            </td>
            <td style="width: 15%;text-align: center">
            <?php
                    if (isset($_SESSION['login'])) {
                        # code...
                        echo "<a href='index.php?do=result&id={$row['id']}'><i class='bx bxs-pie-chart-alt-2'></i></a>";
                    }else{
                        echo "<a href='index.php?do=login'><i class='bx bx-log-in'></i></a>";
                    }
                ?>
            </td>
            
        </tr>
    <?php
    }
    ?>
</table>