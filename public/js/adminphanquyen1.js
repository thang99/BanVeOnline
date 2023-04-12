function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
        e.preventDefault(); 
        load_data_pq(pagepq);
    }
};
var pagepq =1;
$(document).ready(function() {   
    load_data_pq(1);
    $(document).on('click',  '.page-link', function() {
        pagepq = $(this).data('page_number');
        load_data_pq(pagepq);
        $(document).on("keydown", disableF5);
    }); 
    $(document).on('click',  '#detailpq', function() {
        var idquyen = $(this).data('idquyen');
        var tenquyen = $(this).data('tenquyen');
        var chitietquyen = $(this).data('chitietquyen');
      
        
        $('#idquyen').text(idquyen);
        $('#tenquyen').text(tenquyen);
        $('#qldm').text(chitietquyen);
      
        
        
    });
});

function load_data_pq(pagepq) {
    $.post('./Ajax/adminpq', {page:pagepq}, function(data) {
        $('#adminpq').html(data);
        $(window).scrollTop(0);
    });
}

