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
            justify-content: center;
            color: #302e4d;
            min-width: 150vh;

        }

        .login-div {
            width: 430px;
            height: 500px;
            padding: 50px 35px 35px 35px;
            border-radius: 40px;
            background-color: #ecf0f3;
            box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
        }

        .log {
            font-size: 4rem;
            text-align: center;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto;
            box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaaf, -8px -8px 15px #fff;
        }

        .fields {
            width: 100%;
            padding: 0px 5px 5px 5px;
        }

        .fields input {
            border: none;
            outline: none;
            background: none;
            font-size: 18px;
            color: #555;
            padding: 20px 10px 20px 5px;
        }

        .fields i {
            font-size: 22px;
            margin: 0 10px -3px 25px;
        }

        .username,
        .password {
            margin-bottom: 30px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;

        }

        .signin-button {
            outline: none;
            border: none;
            cursor: pointer;
            width: 40%;
            height: 60px;
            border-radius: 30px;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            text-align: center;
            background-color: var(--main-color-dark);
            box-shadow: 3px 3px 8px #b1b1b1, -3px -3px 8px #fff;
            transition: all 0.5s;
            mlmargin-left: 20px;
        }

        .signin-button:hover.login {
            background-color: #B2BF4E;
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

        .link {
            padding-top: 10px;
            text-align: center;
        }

        .link i {
            font-weight: 700;
        }

        .link a {
            font-size: 16px;
            color: #BF1304;

        }
    </style>

</head>

<body>
    <div class="login-main">
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
        if (user.acc==''||user.pw==''||user.pw2==''||user.email=='') {
            alert("不可空白")
        } else {
            // if (密碼是否相同) {
            if (user.pw==user.pw2) {
                //相同
                // $.post("./api/chk_acc.php",{acc:user.acc},(result)=>{
                $.post("./api/chk_acc.php",{acc:user.acc,pw:user.pw,email:user.email},(result)=>{

                    // if (檢查帳號是否重覆) {
                    if (result.status === 'error') {
                        alert("帳號重覆");
                        location.href='?do=login';

                    }else{
                        //新增帳號
                        $.post("./api/reg.php",user,()=>{
                            alert("註冊完成，歡迎加入");
                            location.href='?do=login';
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