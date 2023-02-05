<?php
//頁數
$all = $Que->count(['parent' => 0]);
// dd($all);
$div = 4;
$pages = ceil($all / $div);
$now = $_GET['p'] ?? 1;
$start = ($now - 1) * $div;
$rows = $Que->all(" limit $start , $div");
$subjects = $Que->all(['parent' => 0]);
// dd($row);
?>
<div class="login-main">
    <div class="admin-div">
        <div class="fields">
            <legend><i class='bx bx-add-to-queue'></i>問卷管理</legend>
            <form action="./api/edit_que.php" method="post">
                <table>
                    <tr>
                        <th>編號</th>
                        <th>主題</th>
                        <th>啟用</th>
                        <th>刪除</th>
                    </tr>
                    <?php
                    foreach ($subjects as $key => $subject) {
                        # code...
                    ?>
                        <tr>
                            <td style="width: 15%;">
                                <?= $key + 1; ?>
                            </td>
                            <td style="text-align:left;">
                                <?= $subject['text']; ?>
                            </td>
                            <td style="width: 15%;">
                                <input type="checkbox" name="sh[]" value="<?= $subject['id']; ?>" <?= ($subject['sh'] == 1) ? 'checked' : ''; ?>>
                            </td>
                            <td style="width: 15%;">
                                <input type="checkbox" name="del[]" value="<?= $subject['id']; ?>">
                            </td>
                            <input type="hidden" name="id[]" value="<?= $subject['id']; ?>">
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <!-- 分頁 -->
                <div class="pages">
                    <?php
                    if ($pages > 1) {
                        if (($now - 1) > 0) {
                            $pre = $now - 1;
                            echo "<a href='back.php?do=que&p=$pre'><</a>";
                        }
                        for ($i = 1; $i <= $pages; $i++) {
                            $size = ($i == $now) ? "24px" : "16px";
                            echo "<a href='back.php?do=que&p=$i' style='font-size:$size'>$i</a>";
                        }
                        if (($now + 1) <= $pages) {
                            $next = $now + 1;
                            echo "<a href='back.php?do=que&p=$next'>></a>";
                        }
                    }
                    ?>
                </div>

                <div class="btn">
                    <input type="hidden" name="table" value="Que">
                    <input class="signin-button login" type="submit" value="submit">
                </div>

            </form>
        </div>


    </div>
    <div class="login-div" style="height:700px; margin-top: 50px;">
        <!-- <div class="log"><i class='bx bx-user-circle'></i></div> -->
        <div class="fields">
            <form action="./api/add_que.php" method="post">
                <div>
                    <div>標題</div>
                    <div class="password" style="width:340px;">
                        <input type="text" class="pass-input" name="subject" style="width:90%;font-size: 16px;margin-left:10px">
                    </div>
                </div>
                <div class="btn que">
                    <input class="signin-button que" type="button" value="+" onclick="addOption()">
                </div>
                <div >
                    <div>選項</div>
                    <div id="options" >
                        <div class="password"style="width:320px;">
                            <input type="text" class="pass-input" name="option[]" style="width:100%;font-size: 16px;margin-left:10px">
                        </div>
                    </div>
                </div>


        </div>
        <div class="btn">
            <input class="signin-button login" type="submit" value="submit">
            <input class="signin-button reset" type="reset" value="reset">

        </div>

        </form>
    </div>
</div>