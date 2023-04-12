function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
        e.preventDefault(); 
        load_data_hoadon(pagehd);
    }
};
var pagehd =1;
$(document).ready(function() {   
    load_data_hoadon(1);
    $(document).on('click',  '.page-link', function(e) {
        e.preventDefault();
        var date1 = $('#datehd3').val();
        var date2 = $('#datehd4').val();
        pagehd = $(this).data('page_number');
        load_data_hoadon(pagehd, date1, date2);
    });
    $(document).on('click',  '#detailhd', function() {
        var idhoadon = $(this).data('idhoadon');
        var tenkh = $(this).data('tenkh');
        var tenphim = $(this).data('tenphim');
        var tenrap = $(this).data('tenrap');
        var tenphong = $(this).data('tenphong');
        var ghe = $(this).data('ghe');
        var thucpham = $(this).data('thucpham');
        
        
        $('#idhoadon').text(idhoadon);
        $('#tenkh').text(tenkh);
        $('#tenphim').text(tenphim);
        $('#tenrap').text(tenrap);
        $('#tenphong').text(tenphong);
        $('#ghe').text(ghe);
        $('#thucpham').text(thucpham);
        
        
    });
    $(document).on('click', '#submithd', function() {
        var date1 = $('#datehd3').val();
        var date2 = $('#datehd4').val();
        if(date1 > date2) {
            alert("Vui lòng chọn ngày bắt đầu lớn hơn ngày kết thúc!!!");
        } else if(date1 == "" || date2 == "") {
            alert("Vui lòng chọn ngày bắt đầu và ngày kết thúc!!!");
        }else {
            load_data_hoadon(1, date1, date2);
        }
    });
});

function load_data_hoadon(pagehd, date1, date2) {
    $.post('./Ajax/adminhd', {page:pagehd, date1:date1, date2:date2}, function(data) {
        $('#adminhoadon').html(data);
        $(window).scrollTop(0);
    });
}

