function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
        e.preventDefault(); 
        load_data_phim(pagephim);
    }
};
var pagephim =1;
$(document).ready(function() {   
    load_data_phim(1);
    $(document).on('click',  '.page-link', function() {
        pagephim = $(this).data('page_number');
         load_data_phim(pagephim);
        $(document).on("keydown", disableF5);
    }); 
    $(document).on('click',  '.xoaphim', function() {
        var id = $(this).attr('id');
        check_phim1(id);
    }); 
    $(document).on('click',  '.suaphim', function() {
        var id = $(this).attr('id');
        check_phim2(id);
    }); 
    $(document).on('change',  '#tinhtrangphim', function() {
        var value = $(this).children('option:selected').val();
        var id = $(this).attr('name');
        check_phim(id, value);
    });
    $(document).on('click',  '#detail', function() {
        var hinhphim = $(this).data('hinhphim');
        var idphim = $(this).data('idphim');
        var tenphim = $(this).data('tenphim');
        var idtheloai = $(this).data('idtheloai');
        var noidung = $(this).data('noidung');
        var thoiluong = $(this).data('thoiluong');
        var ngaycongchieu = $(this).data('ngaycongchieu');
        var daodien = $(this).data('daodien');
        var dienvien = $(this).data('dienvien');
        var dinhdangphim = $(this).data('dinhdangphim');
        var gioihantuoi = $(this).data('gioihantuoi');
        $('#hinhphim').attr('src', hinhphim);
        $('#idphim').text(idphim);
        $('#tenphim').text(tenphim);
        $('#idtheloai').text(idtheloai);
        $('#noidung').text(noidung);
        $('#thoiluong').text(thoiluong);
        $('#ngaycongchieu').text(ngaycongchieu);
        $('#daodien').text(daodien);
        $('#dienvien').text(dienvien);
        $('#dinhdangphim').text(dinhdangphim);
        $('#gioihantuoi').text(gioihantuoi);
    });
});

function load_data_phim(pagephim) {
    $.post('./Ajax/adminphim', {page:pagephim}, function(data) {
        $('#adminphim').html(data);
        
    });
}
function load_xoa_phim(id) {
    $.post('./Ajax/xoaphim', {id:id}, function(data) {      
        if(data){
            load_data_phim(pagephim);
            alert("Xóa thành công!!!");
        }
    });
}

function load_tinhtrang_phim(id, value) {
    $.post('./Ajax/setphim', {id:id, value:value}, function(data) {      
        if(data){
            load_data_phim(pagephim);
        }
    });
}
function check_phim(id, value) {
    $.post('./Ajax/checkphim', {id:id, value:value}, function(data) {      
        if(data > 0){
            alert("Phim này đang có suất chiếu trong những ngày tới bạn không thể thay đổi trạng thái !!!");
            load_data_phim(pagephim);
        } else {
            if(confirm("Phim không có suất chiếu trong những ngày tới bạn có muốn thay đổi trạng thái không?")) {
                load_tinhtrang_phim(id, value);
            }
        }
    });
}
function check_phim1(id) {
    $.post('./Ajax/checkphim1', {id:id}, function(data) {      
        if(data > 0){
            alert("Phim này đang có suất chiếu trong những ngày tới bạn không thể xóa !!!");
            load_data_phim(pagephim);
        } else {
            if(confirm("Phim không có suất chiếu trong những ngày tới bạn có muốn xóa không?")) {
                load_xoa_phim(id);
            }
        }
    });
}
function check_phim2(id) {
    $.post('./Ajax/checkphim2', {id:id}, function(data) {      
        if(data > 0){
            alert("Phim này đang có suất chiếu trong những ngày tới bạn không thể sửa !!!");
            load_data_phim(pagephim);
        } else {
            if(confirm("Phim không có suất chiếu trong những ngày tới bạn có muốn sửa không?")) {
                location.href = "Adminphim/Sua/"+id+"";
            }
        }
    });
}