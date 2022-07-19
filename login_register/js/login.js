$(document).ready(function() {




    $('#login').click(function(event) {
        event.preventDefault();
        let username = $('#username').val();
        let password = $('#password').val();

        ValidateUser(username, password);
    });

    function ValidateUser(username, password) {
        $.ajax({
            url: './ws/users_ws.php',
            data: { op: "2", uname: username, upass: password },
            method: "GET",
            dataType: "json",
            success: function (data) {

                if (data == 1) {
                    window.location.href = "../doctors/Dr_Dashboard.php";
                } else if (data == 2) {

                    window.location.href = "../index.php";

                } else if (data == 3) {

                    window.location.href = "../admin/admin_dashboard.php";
                }
                else if (data == 20) {

                    window.location.href = "../center/Patient_formFilling.php";
                }
                else {
                    $(".error").show();
                }
            },

        });
    }

});