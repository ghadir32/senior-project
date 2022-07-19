$(document).ready(function() {

    $(".empty").hide();
    var patient_id = $("#UIDinput").val();

    PatientApp();
    // var patient_id = 4;

    function PatientApp() {
        $.ajax({
            url: './ws/ws_patient_dashboard.php',
            data: { op: "1", id: patient_id},
            method: "GET",
            dataType: "json",

            timeout: 5000,

            success: function (data) {



                    populateApp(data);

            },

        });
    }


    function populateApp(data) {
        $('.tbodyApp').children().remove();
        $.each(data, function(key, value) {
            $('.tbodyApp').append('<tr><td>' + value.doctor_full_name + '</td><td>' + value.date + '</td><td>' + value.start_time + '</td><td>' + value.end_time + '</td><td>' + value.pay_amount + '$</td></tr>');
        });

    }
   
});