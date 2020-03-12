$(document).ready(function () {
    $('#client_time').click(function () {
        $.ajax({
            url: 'client_time.php',
            type: "post",
            data: { date_start: $('#date_start').val(), date_end: $('#date_end').val() },
            success: function (data) {
                $('#html').val(data);
            },
            error: function (data) {
                console.log("Something went wrong!");
            }
        });
    });

    $('#below_zero').click(function () {
        $.ajax({
            url: 'below_zero.php',
            type: "post",
            data: { doc_type: 'json' },
            success: function (data) {
                let jsonVal = JSON.parse(data);
                $('#json').val(JSON.stringify(jsonVal));
            },
            error: function (data) {
                console.log("Something went wrong!");
            }
        });
    });

    $('#client_stat').click(function () {
        var xhr = new XMLHttpRequest();
        let client = $('#client_id').val();
        var params = `client_id=${client}`;
        xhr.open('POST', `client_stat.php`, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
       
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                $('#xml').val(xhr.response);
            }
        }
        xhr.send(params);
    });
});
