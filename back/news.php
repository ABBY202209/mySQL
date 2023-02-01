<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        .login-main {
            font-family: 'Poppins', 'Noto Sans TC';
            min-height: 100vh;
            display: flex;
            position: relative;
            margin: 0;
            height: 100vh;
            overflow: hidden;
            font-weight: 700;
            align-items: center;
            justify-content: space-around;
            color: #302e4d;
            min-width: 150vh;
        }

        .admin-div {
            width: 1000px;
            height: 100%;
            padding: 50px 40px 40px 40px;
            /* border-radius: 40px; */
            /* background-color: #ecf0f3; */

        }

        .admin-div .fields legend {
            font-size: 30px;
            width: 200px;
            height: 60px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: 700;
            color: var(--main-color-dark);
            text-align: center;
            background-color: #ecf0f3;
            box-shadow: 1px 1px 4px #b1b1b1, -1px -1px 4px #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            border-radius: 20px;
        }

        .admin-div .fields legend i {
            font-size: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            display: flex;
            justify-content: center;

        }

        th,
        td {
            /* border: 1px solid #dddddd; */
            padding: 8px;
            text-align: center;
            box-shadow: 0.5px 0.5px 2px #b1b1b1, -0.5px -0.5px 2px #fff;
            border-radius: 10px;

        }

        th {
            color: #fff;
            text-align: center;
            background-color: var(--text-black-700);
            font-weight: 500;
            font-size: 18px;
        }

        td:hover {
            background-color: #728C8A;
            box-shadow: inset 0.5px 0.5px 0.5px #cbced1, inset -0.5px -0.5px 0.5px #fff
        }

        .signin-button {

            outline: none;
            border: none;
            cursor: pointer;
            width: 100px;
            height: 40px;
            border-radius: 20px;
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            text-align: center;
            background-color: var(--main-color-dark);
            box-shadow: 3px 3px 8px #b1b1b1, -3px -3px 8px #fff;
            transition: all 0.5s;
            margin-left: 20px;
        }

        .signin-button:hover.login {
            background-color: #B2BF4E;
        }

        .signin-button:active {
            background-color: var(--main-color-light);
            box-shadow: inset 1.5px 1.5px 1.5px #cbced1, inset -1.5px -1.5px 1.5px #fff;
        }

        .btn {
            display: flex;
            justify-content: space-evenly;
            padding: 10px 10px 20px 5px;


        }

        .ct a {
            width: 20px;
            height: 20px;
            padding: 14px 26px 47px 36px;
            border-radius: 50px;
            background-color: #ecf0f3;
            box-shadow: 6px 6px 10px #cbced1, -6px -6px 10px #fff;
            text-align: center;
            display: flex;
            justify-content: flex-end;

        }
    </style>

</head>

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
                                <?= $row['title']; ?>
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
</body>

</html>