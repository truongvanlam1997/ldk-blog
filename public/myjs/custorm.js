$(document).ready(function () {
    $("#toggleCheckbox").on('click', function (e) {
        var checked = $(this).prop('checked');
        $('input[type=checkbox]').prop('checked', checked);
    });
});
