$(document).ready(function () {
    $('#submit').click(
        function () {
            sendAjaxForm('registration-form', './registration/send');
            return false;
        }
    );
    $('#submit-login').click(
        function () {
            sendAjaxForm('login-form', './login/send');
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
            if (Object.keys(result.errors).length > 0) {
                Object.keys(result.errors).forEach(field => $('#' + field).after(`<p class="error">${result.errors[field]}</p>`));
            } else {
                $('#' + ajax_form).after('<p class="message">Вы успешно зарегистрировались</p>');
                $('#' + ajax_form)[0].reset();
            }
        },
        error: function (response) {
            console.log('Ошибка сервера!');
        }
    });
}
