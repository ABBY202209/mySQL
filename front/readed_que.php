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
            justify-content: center;
            color: #302e4d;
            min-width: 150vh;

        }

        .login-div {
            width: 810px;
            height: 150px;
            padding: 20px 35px 35px 25px;
            border-radius: 40px;
            background-color: #ecf0f3;
            box-shadow: 8px 8px 10px #cbced1, -8px -8px 10px #fff;
        }

        
        .fields {
            width: 100%;
            height: 100%;
                   }

        .signin-button {
            outline: none;
            border: none;
            cursor: pointer;
            width: 15%;
            height: 60px;
            border-radius: 30px;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            text-align: center;
            background-color: var(--main-color-dark);
            box-shadow: 3px 3px 8px #b1b1b1, -3px -3px 8px #fff;
            transition: all 0.5s;
            margin-top: 120px
        }

        .signin-button:hover.login {
            background-color: #B2BF4E;
        }

        .signin-button:hover.reset {
            background-color: #D95959;
        }

        .signin-button:hover.reset {
            background-color: #D95959;
        }

        .signin-button:active {
            background-color: var(--main-color-light);
            box-shadow: inset 2px 2px 2px #cbced1, inset -2px -2px 2px #fff;
        }

        .btn {
            display: flex;
            justify-content: space-evenly;
        }

       
    </style>

</head>
<?php
$row = $Que->find($_GET['id']);
$options = $Que->all(['parent' => $_GET['id']]);
?>

<div class="login-main">
    <div class="login-div">
        <div class="fields">
            <form action="./api/vote.php" method="post">
                <div style="display: flex; font-size:40px; font-weight:700; width:780px; height:140px;">
                    <?= $row['text']; ?>
                </div>
                <div style="display: flex;flex-direction: column;width:600px; font-size:30px; margin-top:20px">
                    <?php
                    // 因為不知道有幾個選項
                    foreach ($options as $opt) {
                        # code...
                        echo "<p>";
                        echo "<input type='radio' name='opt' value='{$opt['id']}' style='margin:10px;transform: scale(2);'> ";
                        echo $opt['text'];
                        echo "</p>";
                    }
                    ?>

                </div>
                <div class="btn">
                    <input class="signin-button login" type="submit" value="submit" id="edit_user">
                    <input class="signin-button reset" type="reset" value="reset">

                </div>

            </form>

        </div>




    </div>
</div>