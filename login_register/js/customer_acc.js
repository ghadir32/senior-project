$(document).ready(function() {


    //this method handle submit click	
    function validateFields() {

        var uppercase = new RegExp('[A-Z]');
        var number = new RegExp('[0-9]');
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var save = true;

        // var name = $("#firstname").val();
        // var lname = $("#lastname").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var uname = $("#uname").val();



        //uname validation
        if (uname == "") {
            $(".error_uname").html("Enter username");
            save = false;
        } else if (uname) {
            $(".error_uname").html("");
        }



        // email validation

        if (email == "") {
            $(".error_email").html("Enter email");
            save = false;
        } else if (!(email.match(pattern))) {
            $(".error_email").html("Enter a valid email address");
            save = false;
        } else if (email) {
            $(".error_email").html("");
        }


        // password validation

        if (password == "") {
            $(".error_password").html("Enter password");
            save = false;
        } else if (password.length < 4) {
            $(".error_password").html("password must contain at least 4 caracters");
            save = false;
        } else if (password.length > 15) {
            $(".error_password").html("password should be less than 15 caracters");
            save = false;
        } else if (!(password.match(uppercase))) {
            $(".error_password").html("password should contain a capital letter");
            save = false;
        } else if (!(password.match(number))) {
            $(".error_password").html("password should contain a number ");
            save = false;
        } else if (password) {
            $(".error_password").html("");
        }

        return save;



    }


    $(".exit").click(function() {

        resetFields();
        exit();


    });

    function exit() {
        $.ajax({

            url: 'ws/users_ws.php',
            data: { op: "3" },
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (data == -1)

                    alert("data couldn't be loaded");

                else {
                    window.location.href = "./login.php";

                }
            },
            error: function(data) {
                alert(data);
            }
        });
    }


    $('#email').keyup(function() {
        CheckEmail($(this).val());
    });

    function CheckEmail(eMail) {
        valid = false

        $.ajax({
            url: 'ws/users_ws.php',
            data: { op: "1", email: eMail },
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (data == true) {
                    $('#email').addClass('error-input');
                    emailIsValid = false;
                } else {
                    $('#email').removeClass('error-input');
                    emailIsValid = true;
                }
            },
            error: function(data) {
                alert(data);
            }
        });
    }

    $('#uname').keyup(function() {
        Checkuname($(this).val());
    });

    function Checkuname(Uname) {
        valid = false;

        $.ajax({
            url: 'ws/users_ws.php',
            data: { op: "4", uname: Uname },
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (data == true) {
                    $('#uname').addClass('error-input');
                    usernameIsValid = false;
                } else {
                    $('#uname').removeClass('error-input');
                    usernameIsValid = true;
                }
            },
            error: function(data) {
                alert(data);
            }
        });
    }

    let emailIsValid = false;
    let usernameIsValid = false;

    $('#submit').click(function() {

        event.preventDefault();

        var email = $("#email").val();
        var name = $("#uname").val();

        let valid = validateFields();
        let validE = emailIsValid;
        let validUN = usernameIsValid;

        //alert(valid + " " + validE + " " + validUN);

        if (valid == true && validE == true && validUN == true) {


            var password = $("#password").val();


            addUser(name, email, password);


        }

    });

    function addUser(Name, Email, password) {
        $.ajax({
            url: 'ws/users_ws.php',
            data: { op: "5", uname: Name, email: Email, pwd: password },
            // lname: lastname
            // uname: username
            method: "GET",
            dataType: "json",

            success: function(data) {
                if (data == -1)
                    alert("data couldn't be loaded");
                else {

                    $('#success').fadeIn(1000);
                    $('#success').fadeOut(1000);
                    resetFields();
                    setTimeout(1000);
                    window.location.href = "./login.php";

                }
            },
            error: function(data) {
                alert(data);
            }

        });
    }

    function resetFields() {
        $("#firstname").val("");
        $("#lastname").val("");
        $("#email").val("");
        $("#password").val("");
        $("#uname").val("");
    }

});