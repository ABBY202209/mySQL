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
                            <th>帳號</th>
                            <th>密碼</th>
                            <th>刪除</th>
                        </tr>
                        <?php
                        foreach ($rows as $row) {
                            ?>
                            <tr>
                                <td>
                                <input type="text" name="acc[]" value="<?=$row['acc'];?>" style="width:95%">
                                </td>
                                
                                <td>
                                    <div class="password">
                                        <input type="password" name="pw[]" value="<?= $row['pw']; ?>">
                                    </div>
                                </td>
                                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
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
            </div>
            <div class="btn">
                <input type="hidden" name="table" value="User">
                <input class="signin-button login" type="submit" value="submit">
                <input class="signin-button reset" type="reset" value="reset">

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
<script>
    //清除
    function reset() {
        $("#acc,#pw,#pw2,#email").val("");
    }

    function reg() {
        //建變數
        let user = {
            'acc': $("#acc").val(),
            'pw': $("#pw").val(),
            'pw2': $("#pw2").val(),
            'email': $("#email").val()
        }

        // if (檢查欄是否有空白) {
        if (user.acc == '' || user.pw == '' || user.pw2 == '' || user.email == '') {
            alert("不可空白")
        } else {
            // if (密碼是否相同) {
            if (user.pw == user.pw2) {
                //相同
                // $.post("./api/chk_acc.php",{acc:user.acc},(result)=>{
                $.post("./api/chk_acc.php", { acc: user.acc, pw: user.pw, email: user.email }, (result) => {

                    // if (檢查帳號是否重覆) {
                    if (result.status === 'error') {
                        alert("帳號重覆");


                    } else {
                        //新增帳號
                        $.post("./api/reg.php", user, () => {
                            alert("新增完成");
                            // reset();
                            window.location.reload();//刷新頁面
                        })
                    }
                })
            } else {
                //不相同
                alert("密碼錯誤");
            }
        }

    }
</script>

</html>