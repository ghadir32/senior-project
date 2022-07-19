
$(document).ready(function () {

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

    
    var spanduration = document.getElementById("Session_Duration");
    var spanprice = document.getElementById("Session_Price");
    var newduration = document.getElementById("newduration");
    var newprice = document.getElementById("newPrice");

    getAccSettings();
    function getAccSettings() {
        var op = 1;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_settings.php",
            dataType: 'json',
            data: { op: op},

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







    getcenterSettings();
    function getcenterSettings() {
        var op = 2;
        var dr_type = $("#dr_type").val();
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_settings.php",
            dataType: 'json',
            data: { op: op, dr_type: dr_type },

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parsecenterSettings(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }


    function parsecenterSettings(response) {

        var duration = response[0].session_duration;
        var price = response[0].session_price;

        spanduration.innerHTML = duration;
        spanprice.innerHTML = price;

        newduration.value = duration;
        newprice.value = price ;


    }

    $("#dr_type").change(function () {
        getcenterSettings();
    })
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
            case 'editDuration':
                document.getElementById("editDuration").style.display = "none";
                spanduration.style.display = "none";
                newduration.style.display = "block";

                break;
            case 'editPrice':
                document.getElementById("editPrice").style.display = "none";
                spanprice.style.display = "none";
                newprice.style.display = "block";



                break;

        }
        
    });

    $('#savecenter').click(function () {


        $('#p6').hide();

        var dr_type = $("#dr_type").val();
      

        if ($("#newduration").val() == "") {
            durationvalidate.style.display = "block";
            return false;

        }
        else if (newduration.value != spanduration.innerHTML) {
            durationvalidate.style.display = "none";
            updatecentersetting(dr_type, "session_duration", newduration.value);
            $('#p6').show();
            $('#p6').text('The change Succeeded');
            setTimeout(function () {
                $('#p6').hide();
            }, 1000);
        }

        

        if ($("#newPrice").val() == "") {
            pricevalidate.style.display = "block";
            return false;

        }



        else if (newprice.value != spanprice.innerHTML) {
            pricevalidate.style.display = "none";
            updatecentersetting(dr_type, "session_price", newprice.value);
            $('#p6').show();
            $('#p6').text('The change Succeeded');
            setTimeout(function () {
                $('#p6').hide();
            }, 1000);
        }







        jQuery('.inputs').hide();
        
        spanprice.style.display = "inline-block";
        spanduration.style.display = "inline-block";

        document.getElementById("editPrice").style.display = "inline-block";
        document.getElementById("editDuration").style.display = "inline-block";


    });



    function updatecentersetting(doctor_type, dataType, dataValue) {
        //alert(dataType + dataValue);
        var op = 3;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_settings.php",
            dataType: 'json',
            data: { op: op, dr_type: doctor_type, dataType: dataType, dataValue: dataValue},

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    getcenterSettings();
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }






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
            url: "./ws/ws_admin_settings.php",
            dataType: 'json',
            data: { op: op, datatype: dataType, datavalue: dataValue },

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
            url: "./ws/ws_admin_settings.php",
            dataType: 'json',
            data: { op: op,email:email, OldPass: OldPass, newPass: newPass },

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
            alert("noooo");
        }
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
