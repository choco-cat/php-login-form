$(document).ready(function () {
    $('#submit').click(
        function () {
            sendAjaxForm('registration-form', './registration/send');
            return false;
        }
    );
});

function sendAjaxForm(ajax_form, url) {
    $('.error').remove();
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: $('#' + ajax_form).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            if (result.errors) {
                Object.keys(result.errors).forEach(field => $('#' + field).after(`<p class="error">${result.errors[field]}</p>`))
            }
        },
        error: function (response) {
            console.log('Ошибка сервера!');
        }
    });
}
