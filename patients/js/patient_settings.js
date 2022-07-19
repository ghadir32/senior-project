
$(document).ready(function () {
    var patient_id = $("#UIDinput").val();

    var patient_image = document.getElementById("patient_image");

    var usernamespan = document.getElementById("Admin_username");
    var emailspan = document.getElementById("Admin_email");
    var usernameInput = document.getElementById("newusername");
    var emailInput = document.getElementById("newemail");
    var oldpass = document.getElementById("oldpass");
    var newpass = document.getElementById("newpass");
    var confirmNewPass = document.getElementById("confirmNewPass");

  
    var emailwarning = document.getElementById("emailWarning");
    var usernamewarning = document.getElementById("usernameWarning");
    var emailvalidate = document.getElementById("emailvalidate");
    var durationvalidate = document.getElementById("durationvalidate");
    var pricevalidate = document.getElementById("pricevalidate");

    

    getAccSettings();
    function getAccSettings() {
        var op = 1;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_settings.php",
            dataType: 'json',
            data: { op: op, patient_id: patient_id},

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseAccSettings(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }


    function parseAccSettings(response) {

        var username = response[0].username;
        var email = response[0].email;
        var password = response[0].password;

        usernamespan.innerHTML = username;
        emailspan.innerHTML = email;
        //passspan.innerHTML = password;

        usernameInput.value = username;
        emailInput.value = email;
        // passInput.value = password;

    }
    getimage();
    function getimage() {
        var op = 2;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_settings.php",
            dataType: 'json',
            data: { op: op, patient_id: patient_id },

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseimage(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }


    function parseimage(response) {

        patient_image.src = "../images/" + response[0].patient_image;

    }
    $('.editt').click(function (e) {
        var clicked_icon = $(e.target).attr('id');


        switch (clicked_icon) {
            case 'editUsername':
                document.getElementById("editUsername").style.display = "none";
                usernamespan.style.display = "none";
                usernameInput.style.display = "block";

                break;

            case 'editEmail':
                document.getElementById("editEmail").style.display = "none";
                emailspan.style.display = "none";
                emailInput.style.display = "block";
                emailwarning.style.display = "block";
                break;

            case 'editPass':
                document.getElementById("editPass").style.display = "none";
                newpass.style.display = "block";
                confirmNewPass.style.display = "block";
                oldpass.style.display = "block";


                break;


            default:
                break;

        }
        
    });

   






    //update Account
    $('#saveAcc').click(function () {

        if ($("#newusername").val() == "") {
            usernamewarning.style.display = "block";
            return false;

        }
        else if (usernameInput.value != usernamespan.innerHTML) {
                updateAccsetting("username", usernameInput.value);
            $('#p5').show();
            $('#p5').text('The change Succeeded');
            setTimeout(function () {
                $('#p5').hide();
            }, 1000);
        }

        if ($("#newemail").val() == "") {
            emailvalidate.style.display = "block";
            return false;

        }
        else if (emailInput.value != emailspan.innerHTML) {
            updateAccsetting("email", emailInput.value);
            $('#p5').show();
            $('#p5').text('The change Succeeded');
            setTimeout(function () {
                $('#p5').hide();
            }, 1000);
        }

        if (newpass.style.display == "block") {
            if (oldpass.value == '') {
                var oldalert = document.getElementById("oldPassAlert");
                oldalert.style.display = "block";
                return false;
            }
            else if (newpass.value == '' || confirmNewPass.value == '' || oldpass.value == '') {
                var newpassAlert = document.getElementById("newPassAlert");
                newpassAlert.style.display = "block";
                return false;
            }
            else {
                if (newpass.value == confirmNewPass.value) {
                    updatePassAccsetting(emailInput.value,oldpass.value, newpass.value);
                }
                else {
                    var newpassAlert = document.getElementById("newPassAlert");
                    newpassAlert.style.display = "block";
                    return false;
                }
            }


        }

        


        jQuery('.inputs').hide();
        jQuery('.alert').hide();

        usernamespan.style.display = "inline-block";
        emailspan.style.display = "inline-block";
        document.getElementById("editUsername").style.display = "inline-block";
        document.getElementById("editEmail").style.display = "inline-block";

        document.getElementById("editPass").style.display = "inline-block";


    });


    function updateAccsetting(dataType, dataValue) {
        //alert(dataType + dataValue);
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_settings.php",
            dataType: 'json',
            data: { op: op, patient_id: patient_id, datatype: dataType, datavalue: dataValue },

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    getAccSettings();
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
    function updatePassAccsetting(email,OldPass, newPass) {
        //alert(dataType + dataValue);

        
        var op = 5;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_settings.php",
            dataType: 'json',
            data: { op: op, patient_id: patient_id, email: email, OldPass: OldPass, newPass: newPass },

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    validate(response);
                    getAccSettings();
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
    function validate(data) {
        if (data == "0") {
            $('#p5').show();
            $('#p5').text('The change Succeeded');
            setTimeout(function () {
                $('#p5').hide();
            }, 1000);
        }
        else {
            alert("wrong old password");
        }
    }


    $("#file").on("change", function (e) {
        console.log(e.target.files[0].name);
        document.getElementById("patient_image").src = "../images/" + e.target.files[0].name;

        var op = 3;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_settings.php",
            dataType: 'json',///////doc id
            data: { op: op, patient_id: patient_id, img: e.target.files[0].name },

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    getimage();

                    window.location.href = "./patient_settings.php";
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    })
});
