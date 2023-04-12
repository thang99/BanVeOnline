$(document).ready(function(){
    $(document).on('click', '#phong2', function(){
        var phim = $('#phim').children("option:selected").val();
        var rap = $('#rap').children("option:selected").val();
        var ngay = $('#ngay').val();
        var gio = $('#time').val();
        if($.trim(phim).length > 0 && $.trim(rap).length > 0 && $.trim(ngay).length > 0 && $.trim(gio).length > 0) {
            $.post("Ajax/loadphong", {phim:phim, rap:rap, ngay:ngay, gio:gio}, function(data) {
                $('#phong1').html(data);
            });
        } else {
            alert("Vui lòng chọn đầy đủ những thông tin trên rồi mới chọn phòng !!!")
        }

    });
    $(document).on('click', '.ok', function(){
        //var selectedCountry = $(this).children("option:selected").val();
        var a = $(this).val();
        alert(a);
    });
});