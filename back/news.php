<link rel="stylesheet" href="./css/main.css">
<body>
    <?php
    //頁數
    $all = $News->count();
    $div = 6;
    $pages = ceil($all / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    $rows = $News->all(" limit $start , $div");
    ?>
    <div class="login-main">
        <div class="admin-div">

            <div class="fields">
                <legend><i class='bx bx-list-plus'></i>最新消息管理</legend>
                <form action="./api/edit.php" method="post">

                    <table>
                        <tr>
                            <th>編號</th>
                            <th>標題</th>
                            <th>顯示</th>
                            <th>刪除</th>
                        </tr>
                        <?php
                        foreach ($rows as $key => $row) {
                            ?>
                            <tr>
                                <td>
                                    <?= $key + 1; ?>
                                </td>
                                <td>
                                    <a href="index.php?do=modal/news.php">
                                        <?= $row['title']; ?>
                                    </a>
                                </td>
                                <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?=($row['sh'] == 1) ? 'checked' : ''; ?>>
                                </td>
                                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <!-- 分頁 -->
                    <div class="ct">
                        <?php
                        if (($now - 1) > 0) {
                            $pre = $now - 1;
                            echo "<a href='back.php?do=news&p=$pre'><</a>";
                        }
                        for ($i = 1; $i <= $pages; $i++) {
                            # code...
                            $size = ($i == $now) ? "24px" : "16px";
                            echo "<a href='back.php?do=news&p=$i' style='font-size:$size'>$i</a>";
                        }
                        if (($now + 1) <= $pages) {
                            # code...
                            $next = $now + 1;
                            echo "<a href='back.php?do=news&p=$next'>></a>";
                        }
                        ?>
                    </div>
                    <div class="btn">
                        <input class="signin-button login" type="submit" value="submit">
                    </div>

                </form>
            </div>
            <div class="login-div">
                <!-- <div class="log"><i class='bx bx-user-circle'></i></div> -->
                <div class="fields">
                    <div class="username">
                        <i class='bx bx-user-plus'></i>
                        <input type="text" class="user-input" placeholder="username" name="acc" id="acc">
                    </div>
                    <div class="password">
                        <i class='bx bx-key'></i>
                        <input type="password" class="pass-input" placeholder="password" name="pw" id="pw">
                    </div>
                    <div class="password">
                        <i class='bx bx-key'></i>
                        <input type="password" class="pass-input" placeholder="reconfirm password" name="pw2" id="pw2">
                    </div>
                    <div class="password">
                        <i class='bx bx-envelope'></i>
                        <input type="text" class="pass-input" placeholder="e-mail" name="email" id="email">
                    </div>
                </div>
                <div class="btn">
                    <button class="signin-button login" onclick="reg()">register</button>
                    <button class="signin-button reset" onclick="reset()">reset</button>
                </div>


            </div>
        </div>
</body>

</html>