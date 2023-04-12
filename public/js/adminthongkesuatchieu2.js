function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82){
        e.preventDefault();
    }
};
var pagetksc =1;
$(document).ready(function() {   
    load_data_tksc(1);
    $(document).on('click',  '.page-link', function(e) {
        e.preventDefault();
        var date1 = $('#datesc1').val();
        var date2 = $('#datesc2').val();
        pagetksc = $(this).data('page_number');
        var tenphim = $('#tenphim').children("option:selected").val();
        load_data_tksc(pagetksc, date1, date2, tenphim);
    }); 
    $(document).on('click', '#submittksc', function() {
        var date1 = $('#datesc1').val();
        var date2 = $('#datesc2').val();
        var tenphim = $('#tenphim').children("option:selected").val();
        if(date1 > date2) {
            alert("Vui lòng chọn ngày bắt đầu lớn hơn ngày kết thúc!!!");
        } else if(date1 == "" || date2 == "") {
            alert("Vui lòng chọn ngày bắt đầu và ngày kết thúc!!!");
        }else {
            load_data_tksc(1, date1, date2, tenphim);
        }
    });
    $(document).on('change', '#tenphim', function() {
        var tenphim = $('#tenphim').children("option:selected").val();
        var date1 = $('#datehd1').val();
        var date2 = $('#datehd2').val();
        load_data_tkrap(1, date1, date2, tenphim);
        alert(tenphim);  
    });
    
});

function load_data_tksc(pagetksc, date1, date2, tenphim) {
    $.post('./Ajax/admintksc', {page:pagetksc, date1:date1, date2:date2, tenphim:tenphim}, function(data) {
        $('#adminthongkesuatchieu').html(data);
        $(window).scrollTop(0);
        
    });
}
