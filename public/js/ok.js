$(document).ready(function() {
    $.post("./Ajax/checkname", {}, function(data) {
        alert(data);
    });
});