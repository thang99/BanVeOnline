function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82)
        e.preventDefault(); 
};
 
$(document).ready(function() {   
    load_data(1);
    $(document).on('click',  '.page-link', function() {
        var page = $(this).data('page_number');
        var query = $('#search-box').val();
        load_data(page, query);
        $(document).on("keydown", disableF5);
    }); 
    $('#oksearch').submit(function(){
        location.href = "phim/Show";
        var query = $('#search-box').val();
        load_data(1,query);
    });
    $('#search-box').keyup(function(){
        var query = $('#search-box').val();
        
        load_data(1,query);
        
    });
    
});
function load_data(page, query="") {
    $.post('./Ajax/ok', {page:page, query:query}, function(data) {
        $('#okok').html(data);
        $(window).scrollTop(0);
    });
}


    