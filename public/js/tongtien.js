 
$(document).ready(function() { 
    
    $(document).on('click',  '.thucpham', function() {
        var page = $(this).attr('id');
        var soluong = $('#'+page+'').val();
        load_data_thucpham(page, soluong);
    }); 
    $(document).on('click',  '.ve', function() {
        var page1 = $(this).attr('id');
        var soluong1 = $('#'+page1+'').val();
        var idsuatchieu1 = $(this).attr('name');
        load_data_ve(page1, soluong1, idsuatchieu1);
    });
    $(document).on('click',  '.thucpham', function() {
        location.reload();
    });
    $(document).on('click',  '.ve', function() {
        location.reload();
    });
    $(document).on('click',  '.muave2', function() {
        var idsuatchieu = $(this).attr('id');
        alert("ok");
        load_data_muave2(idsuatchieu)
    });
}); 
function load_data_thucpham(page, soluong) {
    $.post('./Ajax/giohang', {page:page, soluong:soluong}, function(data) {
        if(data) {
        }
    });
}
function load_data_ve(page1, soluong1, idsuatchieu1) {
    $.post('./Ajax/giohang1', {page:page1, soluong:soluong1, idsuatchieu:idsuatchieu1}, function(data) {
        if(data) {
        }
    });
}

