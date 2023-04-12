function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82){
        e.load_data_tkrap();
    }
};
var pagetkhd =1;
$(document).ready(function() {   
    load_data_tkrap(1);
    $(document).on('click',  '.page-link', function(e) {
        e.preventDefault();
        var date1 = $('#datehd1').val();
        var date2 = $('#datehd2').val();
        pagetkhd = $(this).data('page_number');
        load_data_tkrap(pagetkhd, date1, date2, tenrap);
    }); 
    $(document).on('click', '#submittkhd', function() {
        var tenrap = $('#tenrap').children("option:selected").val();
        var date1 = $('#datehd1').val();
        var date2 = $('#datehd2').val();
        if(date1 > date2) {
            alert("Vui lòng chọn ngày bắt đầu lớn hơn ngày kết thúc!!!");
        } else if(date1 == "" || date2 == "") {
            alert("Vui lòng chọn ngày bắt đầu và ngày kết thúc!!!");
        }else {
            load_data_tkrap(1, date1, date2, tenrap);
        }
    });
    $(document).on('change', '#tenrap', function() {
        var tenrap = $('#tenrap').children("option:selected").val();
        var date1 = $('#datehd1').val();
        var date2 = $('#datehd2').val();
        load_data_tkrap(1, date1, date2, tenrap);
    });

});

function load_data_tkrap(pagetkhd, date1, date2, tenrap) {
    $.post('./Ajax/admintkhd', {page:pagetkhd, date1:date1, date2:date2, tenrap:tenrap}, function(data) {
        $('#adminthongketheorap').html(data);
        $(window).scrollTop(0);
        
    });
}
