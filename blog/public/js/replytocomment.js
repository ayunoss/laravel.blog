$(document).ready(function () {
    $(document).on("click", "#reply", function () {
        var body = ("#comment").text();
        var comment = ("textarea[name='body']").val('"' + body + '"' + '<br/>');
    });
});
