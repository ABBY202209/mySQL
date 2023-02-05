<link rel="stylesheet" href="./css/main.css">

<body>
    <?php
    //頁數
    $all = $User->count();
    $div = 5;
    $pages = ceil($all / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    $rows = $User->all(" limit $start , $div");
    ?>
    <div class="login-main">
        <div class="admin-div">
            <div class="fields">
                <legend><i class='bx bx-user-pin'></i>帳號管理</legend>
                <form action="./api/edit.php" method="post">
                    <table>
                        <tr>
                            <th style="width: 15%;">編號</th>
                            <th style="width: 35%;">帳號</th>
                            <th style="width: 35%;">密碼</th>
                            <th style="width: 15%;">刪除</th>
                        </tr>
                        <?php
                        foreach ($rows as $key => $row) {
                            ?>
                            <tr>
                                <td style="width: 15%;">
                                    <?= $key + 1; ?>
                                </td>
                                <td>
                                    <input type="text" name="acc[]" value="<?= $row['acc']; ?>" style="width:70%">
                                </td>
                                <td>
                                    <div class="password">
                                        <input type="password" name="pw[]" value="<?= $row['pw']; ?>">
                                    </div>
                                </td>
                                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            </tr>
                            <?php
                        }
                        ;
                        ?>
                    </table>
                    <div class="pages">
                        <?php
                        if ($pages > 1) {
                            if (($now - 1) > 0) {
                                $pre = $now - 1;
                                echo "<a href='back.php?do=user&p=$pre'><</a>";
                            }
                            for ($i = 1; $i <= $pages; $i++) {
                                $size = ($i == $now) ? "24px" : "16px";
                                echo "<a href='back.php?do=user&p=$i' style='font-size:$size'>$i</a>";
                            }
                            if (($now + 1) <= $pages) {
                                $next = $now + 1;
                                echo "<a href='back.php?do=user&p=$next'>></a>";
                            }
                        }
                        ?>
                    </div>
                    <div class="btn">
                        <input type="hidden" name="table" value="User">
                        <input class="signin-button login" type="submit" value="submit" id="edit_user">
                        <input class="signin-button reset" type="reset" value="reset">

                    </div>
                </form>
            </div>

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