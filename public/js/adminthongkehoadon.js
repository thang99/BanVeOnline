function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82){
        e.preventDefault();
        load_data_tkhd(pagetkhd);   
    }
};
var pagetkhd =1;
$(document).ready(function() {   
    load_data_tkhd(1);
    $(document).on('click',  '.page-link', function(e) {
        e.preventDefault();
        var date1 = $('#datehd1').val();
        var date2 = $('#datehd2').val();
        pagetkhd = $(this).data('page_number');
        load_data_tkhd(pagetkhd, date1, date2);
    }); 
    $(document).on('click', '#submittkhd', function() {
        var date1 = $('#datehd1').val();
        var date2 = $('#datehd2').val();
        sxtd = $('#sxtkhd').children("option:selected").val();
        if(date1 > date2) {
            alert("Vui lòng chọn ngày bắt đầu lớn hơn ngày kết thúc!!!");
        } else if(date1 == "" || date2 == "") {
            alert("Vui lòng chọn ngày bắt đầu và ngày kết thúc!!!");
        }else {
            load_data_tkhd(1, date1, date2);
        }
    });

});

function load_data_tkhd(pagetkhd, date1, date2) {
    $.post('./Ajax/admintkhd', {page:pagetkhd, date1:date1, date2:date2}, function(data) {
        $('#adminthongkehoadon').html(data);
        $(window).scrollTop(0);
        
    });
}
