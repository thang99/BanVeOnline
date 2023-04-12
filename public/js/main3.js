function Loadthanhvien2() {
    $.ajax("http://localhost/DoAnWeb2/thanhvien2")
    .done(function (rs) {
        $('#msg').html(rs);
    })
}


$(document).ready(function() {
    $('#btnLogin').click(function() {
        var user = $('#loginEmail').val();
        var pass = $('#loginPwd').val();
        if($.trim(user).length > 0 && $.trim(pass).length > 0) {
            $.post("./Ajax/check", {un: user, pwd: pass}, function(data) {
                if(data == "ok") {
                    alert("Đăng nhập thành công!!!");
                    location.href = 'Home';
                    
                } else if(data =="khoa") {
                    alert('Tài khoản bạn đã vị phạm bản quyền đối với website chúng tôi !!!');
                } else {
                    alert('Tài khoản hoặc mật khẩu không đúng !!!');
                }
            });
        } else {
            alert("Vui lòng nhập tài khoản và mật khẩu !!!");
        }
    });  
    
});
function phim1() {
    document.getElementById('phim1').style.display="block";
    document.getElementById('phim2').style.display="none";
}
function phim2() {
    document.getElementById('phim2').style.display="block";
    document.getElementById('phim1').style.display="none";
}
