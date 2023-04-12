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
                    location.href = 'Home';
                    alert(data);
                } else {
                    alert(data);
                }
            });
        } else {
            alert("Invalid Empty");
        }
    });  

});

