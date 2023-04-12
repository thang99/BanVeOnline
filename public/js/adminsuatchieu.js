function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
        e.preventDefault(); 
        load_data_sc(pagesc);
    }
};
var pagesc =1;
$(document).ready(function() {   
    load_data_sc(1);
    $(document).on('click',  '.page-link', function() {
        pagesc = $(this).data('page_number');
        load_data_sc(pagesc);
        $(document).on("keydown", disableF5);
    }); 
    $(document).on('click',  '#detailsc', function() {
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
});

function load_data_sc(pagesc) {
    $.post('./Ajax/adminsc', {page:pagesc}, function(data) {
        $('#adminsuatchieu').html(data);
        $(window).scrollTop(0);
        alert(data);
    });
}


