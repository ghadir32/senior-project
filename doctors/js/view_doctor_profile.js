$(document).ready(function () {
    var doctor_id = $("#doctor_id").val();




 

    getdoctorinformation();
    function getdoctorinformation() {
        var op = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_doctor_profile.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id },

            success: function (response) {
                if (response == null)
                    alert("Data couldn't be loaded!");

                else {
                    parsedoctorinformation(response);
                }
            },

        });
    }
    function parsedoctorinformation(response) {
        var fullname = response[0].doctor_full_name;
        var email = response[0].email;
        var phone = response[0].Phone_number; about_yourself

        var about_yourself = response[0].about_yourself;
        var professional_statement = response[0].professional_statement;
        var job_title = response[0].job_title;
        var education = response[0].education;

        var experience = response[0].experience;
        var doctor_age = response[0].doctor_age;
        var doctor_gender = response[0].doctor_gender;

        var guild_number = response[0].guild_number;
        var dr_type = response[0].dr_type;
        var profile_image = response[0].doctor_image;

        $("#name").text(fullname);
        $("#doctor_type").text("Doctor Type: " + dr_type);
        $("#guild_number").text("Guild Number: " + guild_number);
        $("#phone_number").text("Phone Number: " + phone);
        $("#email").text("Email Address: " + email);
        $("#job_title").text(job_title);
        $("#education").text(education);
        $("#gender").text(doctor_gender);
        $("#age").text(doctor_age);
        $("#professional_statments").text(professional_statement);
        $("#About_yourself").text(about_yourself);
        $("#experience").text(experience);

        document.getElementById("profile_img").src = "../images/" + profile_image + "";


    }
    getdoctorspecialities();
    function getdoctorspecialities() {
        var op = 2;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_doctor_profile.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id },

            success: function (response) {
                parsedoctorspecialities(response);

            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
    function parsedoctorspecialities(response) {
        if (response) {
            $.each(response, function (index, value) {
                var specialities = response[index].spec_name;
                $("#specialities").append(specialities + " ");
            })
        }
        else {
            var text = "don't have specialities";
            $("#specialities").append(text);
        }




        //{
        //    var specialities = response[0].spec_name;
        //    var print = $("#specialities").text(specialities);
        //    print = print + ", "+ $("#specialities").text(specialities);
        //}


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


