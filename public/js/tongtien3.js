 
$(document).ready(function() { 
    $(document).on('click',  '.thucpham', function() {
        var page = $(this).attr('id');
        var soluong = $('#'+page+'').val();
        var idsuatchieu1 = $(this).attr('name');
        load_data_thucpham(page, soluong, idsuatchieu1);
    }); 
    $(document).on('click',  '.ve', function() {
        var page1 = $(this).attr('id');
        var soluong1 = $('#'+page1+'').val();
        var idsuatchieu = $(this).attr('name');
        load_data_ve(page1, soluong1, idsuatchieu);
    });

    $(document).on('click',  '.muave2', function() {
        var idsuatchieu = $(this).attr('id');
        load_data_muave2(idsuatchieu)
    });
}); 
function load_data_thucpham(page, soluong, idsuatchieu1) {
    $.post('./Ajax/giohang', {page:page, soluong:soluong}, function(data) {
        if(data) {
            load_data_muave2(idsuatchieu1);
        }
    });
}
function load_data_ve(page1, soluong1, idsuatchieu1) {
    $.post('./Ajax/giohang1', {page:page1, soluong:soluong1, idsuatchieu:idsuatchieu1}, function(data) {
        if(data) {
            load_data_muave2(idsuatchieu1);
        }
    });
}
function load_data_muave2(idsuatchieu1) {
    $.post('./Ajax/ajaxmuave2', {idsuatchieu:idsuatchieu1}, function(data) {
        if(data) {
            $('#showcart').html(data);

        }
    });
}
