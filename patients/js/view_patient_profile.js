
$(document).ready(function () {
    var patient_id = $("#patient_id").val();






    getpatieninformation();
    function getpatieninformation() {
        var op = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_patient_profile.php",
            dataType: 'json',
            data: { op: op, patient_id: patient_id },

            success: function (response) {
                if (response == null)
                    alert("Data couldn't be loaded!");

                else {
                    parsepatientinformation(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
    function parsepatientinformation(response) {
        var fullname = response[0].patients_full_name;
        var email = response[0].email;
        var phone = response[0].p_phone_number;

        var location = response[0].location;

        var nb_of_family = response[0].nb_of_family;
        var employed = response[0].employed_or_not;

        var description = response[0].description;
        var age = response[0].p_age;
        var gender = response[0].p_gender;

        var patient_image = response[0].patient_image;

        $("#name").text(fullname);
        $("#phone_number").text("Phone Number: " + phone);
        $("#email").text("Email Address: " + email);

        $("#nb_of_family").text(nb_of_family);
        $("#employed").text(employed);
        $("#gender").text(gender);
        $("#age").text(age);

        $("#location").text(location);
        $("#description").text(description);
        document.getElementById("profile_img").src = "../images/" + patient_image + "";
    }
    $(document).on('click', '#logout', function () {

        var op = 3;
        $.ajax({
            type: 'GET',
            url: "../login_register/ws/users_ws.php",
            dataType: 'json',
            data: { op: op },
            success: function (response) {
                window.location.href = "../login_register/login.php";
            },
        });

    });
});


