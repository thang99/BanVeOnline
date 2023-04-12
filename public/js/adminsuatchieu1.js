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
        var idsuatchieu = $(this).data('idsuatchieu');
        var tenphim = $(this).data('tenphim');
        var tenrap = $(this).data('tenrap');
        var tenphong = $(this).data('tenphong');
        var ngaychieu = $(this).data('ngaychieu');
        var giobatdau = $(this).data('giobatdau');
        var gioketthuc = $(this).data('gioketthuc');
        
        
        $('#idsuatchieu').text(idsuatchieu);
        $('#tenphim').text(tenphim);
        $('#tenrap').text(tenrap);
        $('#tenphong').text(tenphong);
        $('#ngaychieu').text(ngaychieu);
        $('#giobatdau').text(giobatdau);
        $('#gioketthuc').text(gioketthuc);
        
        
    });
});

function load_data_sc(pagesc) {
    $.post('./Ajax/adminsc', {page:pagesc}, function(data) {
        $('#adminsuatchieu').html(data);
        $(window).scrollTop(0);
    });
}


