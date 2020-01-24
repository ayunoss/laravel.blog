$(document).ready(function () {
    $("#form").on("submit", function (event) {
        var json;
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                data = JSON.parse(data);
                if (data.status === 'error') {
                    alert(json.status + ' - ' + json.message);
                } else if (data.status === 'success' && data.message === 'OK') {
                    window.location.href = "/";
                }
            },
        });
    });
});
