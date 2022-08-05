$(document).ready(function () {
    $('#submit').click(
        function () {
            sendAjaxForm('registration-form', './registration/send', 'Вы успешно зарегистрировались');
            return false;
        }
    );
    $('#submit-login').click(
        function () {
            sendAjaxForm('login-form', './user/send', 'Вы успешно авторизовались');
            return false;
        }
    );
});

function sendAjaxForm(ajax_form, url, message) {
    $('.error').remove();
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: $('#' + ajax_form).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            if (typeof result === 'object' && Object.keys(result.errors).length > 0) {
                Object.keys(result.errors).forEach(field => $('#' + field).after(`<p class="error">${result.errors[field]}</p>`));
            } else {
                setTimeout(() => window.location.href = './', 1000);
                $('#' + ajax_form).after(`<p class="message">${message}</p>`);
                $('#' + ajax_form)[0].reset();
            }
        },
        error: function (response) {
            console.log('Ошибка сервера!');
        }
    });
}
