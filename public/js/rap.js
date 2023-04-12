
$(document).ready(function() {   
    var film = '';
    $(document).on('click',  '.vefilm-link', function(event) {
        event.preventDefault();
        film = $(this).attr('href');
        load_data_rap(film);
        load_data_suat("","");
    }); 
    var rap = "";
    $(document).on('click',  '.rap-link', function(event) {
        event.preventDefault();
        rap = $(this).attr('href');
        load_data_suat(film, rap);
    }); 

});

function load_data_rap(film) {
    $.post('./Ajax/rapfilm', {film:film}, function(data) {
        if(data=="<ul></ul>") {
            $('#rap').html("<ul><li>Vui lòng chọn rạp</li></ul>");
        } else {
            $('#rap').html(data);
        }
    });
}

function load_data_suat(film, rap) {
    if(film == "" || rap == "") {
        $('#suat').html("<ul><li>Vui lòng chọn suất</li></ul>");
    } else {
        $.post('./Ajax/suatfilm', {film:film, rap:rap}, function(data) {
            $('#suat').html(data);
        });
    }
}