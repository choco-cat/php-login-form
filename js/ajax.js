$(document).ready(function () {
    $('#submit').click(
        function () {
            sendAjaxForm('registration-form', './registration/send');
            return false;
        }
    );
});

function sendAjaxForm(ajax_form, url) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: $('#' + ajax_form).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            console.log('Успешно');
        },
        error: function (response) {
            console.log('Ошибка');
        }
    });
}
