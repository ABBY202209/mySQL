// 修改完成
$(document).ready(function () {
    $("#edit_user").click(function () {
        alert("修改已完成");
    });
});
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