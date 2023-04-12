function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
        e.preventDefault(); 
        load_data_ls(pagels);
    }
};
var pagels =1;
$(document).ready(function() {   
    load_data_ls(1);
    $(document).on('click',  '.page-link', function(e) {
        e.preventDefault();
        var date1 = $('#datels').val();
        var date2 = $('#datels1').val();
        pagels = $(this).data('page_number');
        load_data_ls(pagels, date1, date2);
    });
    $(document).on('click',  '#detaills', function() {
        var idhoadon1 = $(this).data('sodienthoai');
        var tenkh1 = $(this).data('tenkh');
        var tenphim1 = $(this).data('tenphim');
        var tenrap1 = $(this).data('tenrap');
        var tenphong1 = $(this).data('tenphong');
        var ghe1 = $(this).data('ghe');
        var thucpham1 = $(this).data('thucpham');
        
        
        $('#idhoadon1').text(idhoadon1);
        $('#tenkh1').text(tenkh1);
        $('#tenphim1').text(tenphim1);
        $('#tenrap1').text(tenrap1);
        $('#tenphong1').text(tenphong1);
        $('#ghe1').text(ghe1);
        $('#thucpham1').text(thucpham1);
        
        
    });
    $(document).on('click', '#submitls', function() {
        var date1 = $('#datels').val();
        var date2 = $('#datels1').val();
        if(date1 > date2) {
            alert("Vui lòng chọn ngày bắt đầu lớn hơn ngày kết thúc!!!");
        } else if(date1 == "" || date2 == "") {
            alert("Vui lòng chọn ngày bắt đầu và ngày kết thúc!!!");
        }else {
            load_data_ls(1, date1, date2);
        }
    });
});

function load_data_ls(pagels, date1, date2) {
    $.post('./Ajax/adminls', {page:pagels, date1:date1, date2:date2}, function(data) {
        $('#lichsu').html(data);
        $(window).scrollTop(0);

    });
}

