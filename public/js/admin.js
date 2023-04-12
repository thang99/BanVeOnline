function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82){
        e.preventDefault();
        load_data_taikhoan(page);   
    }
};
var page =1;
$(document).ready(function() {   
    load_data_taikhoan(1);
    $(document).on('click',  '.page-link', function(e) {
        e.preventDefault();
         page = $(this).data('page_number');
        load_data_taikhoan(page);
        $(document).on("keydown", disableF5);
    }); 
    $(document).on('click',  '.xoaa', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        if(confirm("Bạn có muốn xóa tài khoản này?")) {
            load_xoa(id);
        }
    }); 
    $(document).on('change',  '#tinhtrangtaikhoan', function(e) {
        e.preventDefault();
        var value = $(this).children('option:selected').val();
        var id = $(this).attr('name');
        load_tinhtrang_taikhoan(id, value);
    });
    $(document).on('keyup   ',  '#sear', function(e) {
        e.preventDefault();
        alert('ok');
    });
});

function load_data_taikhoan(page) {
    $.post('./Ajax/admintaikhoan', {page:page}, function(data) {
        $('#admintaikhoan').html(data);
        $(window).scrollTop(0);
    });
}
function load_xoa(id) {
    $.post('./Ajax/xoa', {id:id}, function(data) {      
        if(data){
            load_data_taikhoan(page);
            alert("Xóa thành công!!!");
        }
    });
}
function load_tinhtrang_taikhoan(id, value) {
    $.post('./Ajax/set', {id:id, value:value}, function(data) {      
        if(data){
            load_data_taikhoan(page);
        }
    });
}
