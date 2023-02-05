<body>
    <?php
    //頁數
    $all = $News->count();
    $div = 4;
    $pages = ceil($all / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    $rows = $News->all(" limit $start , $div");
    ?>
    <div class="login-main">
        <div class="admin-div">
            <div class="fields">
                <legend><i class='bx bx-list-plus'></i>最新消息管理</legend>
                <form action="./api/edit_news.php" method="post">
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
                                <td style="width: 15%;">
                                    <?= $key + 1; ?>
                                </td>
                                <td style="text-align:left;">
                                    <a href="back.php?do=edit_news&id=<?=$row['id'];?>" style="text-align:left; width: 30%;">
                                        <?= $row['title']; ?>
                                    </a>
                                </td>
                                <td style="width: 15%;">
                                    <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                                </td>
                                <td style="width: 15%;">
                                    <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                                </td>
                                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
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
                                echo "<a href='back.php?do=news&p=$pre'><</a>";
                            }
                            for ($i = 1; $i <= $pages; $i++) {
                                $size = ($i == $now) ? "24px" : "16px";
                                echo "<a href='back.php?do=news&p=$i' style='font-size:$size'>$i</a>";
                            }
                            if (($now + 1) <= $pages) {
                                $next = $now + 1;
                                echo "<a href='back.php?do=news&p=$next'>></a>";
                            }
                        }
                        ?>
                    </div>

                    <div class="btn">
                        <input type="hidden" name="table" value="News">
                        <input class="signin-button login" type="submit" value="submit">
                    </div>

                </form>
            </div>


        </div>
        <div class="login-div" style="height:700px; margin-top: 50px;">
            <!-- <div class="log"><i class='bx bx-user-circle'></i></div> -->
            <div class="fields">
                <form action="./api/save_news.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div>
                        <div>標題</div>
                        <div class="password">
                            <input id="title" type="text" class="pass-input" name="title" style="width:100%;font-size: 16px;margin-left:10px" >
                        </div>
                    </div>
                    <div>
                        <div>內容</div>
                        <div class="password">
                            <textarea name="text" id="text" cols="40" rows="10"></textarea>
                        </div>
                    </div>
                    <div style="display:flex">
                        <div style="width:100px; margin-top:20px">圖片上傳</div>

                        <input id="img" type="file" class="pass-input" name="img">

                    </div>
            </div>
            <div class="btn">
                <input class="signin-button login" type="submit" value="submit" >
                <input class="signin-button reset" type="reset" value="reset">
                
            </div>

            </form>
        </div>
    </div>
</body>

</html>