function disableF5(e) { 
    if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82)
        e.preventDefault(); 
};
 
$(document).ready(function() {   
    load_data(1);
    $(document).on('click',  '.page-link', function() {
        var page = $(this).data('page_number');
        var query = $('#search-box').val();
        var tlp = $('#tlp').children("option:selected").val();
        load_data(page, query, tlp);
        $(document).on("keydown", disableF5);
    }); 

    $('#search-box').keyup(function(){
        if($(location).attr("href") !== "http://localhost/DoAnWeb2/phim/Show") {
            location.href="phim/Show";
        } else {
            var query = $('#search-box').val();
            var tlp = $('#tlp').children("option:selected").val();
            load_data(1,query, tlp);
        }
    });
    $(document).on('change', '#tlp', function() {
        var tlp = $('#tlp').children("option:selected").val();
        var query = $('#search-box').val();
        load_data(1,query, tlp);
    });
    
});
function load_data(page, query="", tlp) {
    $.post('./Ajax/ok', {page:page, query:query, tlp:tlp}, function(data) {
        $('#okok').html(data);
        $(window).scrollTop(0);
    });
}

