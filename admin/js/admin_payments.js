
// JavaScript source code
$(document).ready(function () {

    //return 0 if <10 needed in date
    function pad(n) {
        return (n < 10 ? '0' : '') + n;
    }
    //get date today
    function getDateToday() {
        var date = new Date();
        var month = pad(date.getMonth() + 1);
        var day = pad(date.getDate());
        var year = date.getFullYear();

        var date_data = year + "-" + month + "-" + day;
        return date_data;

    }



    var columSort = "payments.pay_id DESC";
    Payments();

    function Payments() {

        tableInfo();

        $(".empty").hide();
        var op = 1;
        //request to get data


        var filterdate = $("#filterdate").val();
        var showNumber = $("#show_entries").val();


        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_payments.php",
            data: { op: op, showNumber: showNumber, colum: columSort, filterdate: filterdate },

            dataType: 'json',
            timeout: 5000,
            success: function (response, textStatus, xhr) {

                if (!response) {
                    $(".reload").hide();
                    $(".empty").show();
                    $("#pay_tbody").empty();
                }
                else {
                    $(".reload").hide();
                    $(".empty").hide();
                    data = JSON.parse(xhr.responseText);
                    parsePayments(response);
                }
            },
            error: function (xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
    }
    //parse appointments today 
    function parsePayments(response) {
        $("#pay_tbody").empty();
        var len = response.length;

        for (var i = 0; i < len; i++) {

            var pay_id = response[i].pay_id;
            var pay_app_id = response[i].pay_app_id;
            var doctor_full_name = response[i].doctor_full_name;
            var patients_full_name = response[i].patients_full_name;
            var pay_date = response[i].pay_date;
            var pay_time = response[i].pay_time;
            var app_date = response[i].app_date;
            var app_time = response[i].app_time;
            var pay_amount = response[i].pay_amount;
            var pay_method = response[i].pay_method;

            var doctor_id = response[i].doctor_id;
            var patient_id = response[i].patient_id;

            var row = "<tr  id='" + pay_id + "'  >";
            row += "<td>pay" + pay_id + "</td>";
            row += "<td>App" + pay_app_id + "</td>";
            row += "<td><a class='profile_link'  href='../doctors/view_doctor_profile.php?doctor_id=" + doctor_id + "'>" + doctor_full_name + "</a>   </td>";
            row += "<td><a class='profile_link' href='../patients/view_patient_profile.php?patient_id=" + patient_id + "'>" + patients_full_name + "</a>  </td>";

            row += "<td >" + app_date + "  " + app_time + "</td>";
            row += "<td  >" + pay_date + "  " + pay_time + "</td>";
            row += "<td >" + pay_amount + "$</td>";
            row += "<td class='pay_method' >" + pay_method + "</td>";
            row += "<td> <button class='view action btn name='save' id='view" + pay_id + "' ><i class='fas fa-eye'></i></button></td>";

            $("#pay_tbody").append(row);


        }


    }
    filterbydate();
    show_entries();
    function filterbydate() {
        $("#filterdate").change(function () {
            Payments();
            tableInfo();
        });
    }
    // show number entries
    function show_entries() {
        $("#show_entries").change(function () {
            Payments();

            tableInfo();

        })
    }


    //table info
    function tableInfo() {

        var filterdateinfo = $("#filterdate").val();

        var op = 2;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_payments.php",
            dataType: 'json',
            data: { op: op, filterdateinfo: filterdateinfo },
            success: function (response) {
                parsetableInfo(response);
            },
        });



    }
    //parse table info
    function parsetableInfo(response) {
        var len = response.length;
        var tableLength = 0;
        var selectvalue = $("#show_entries").val();
        var showfrom = 0;
        for (var i = 0; i < len; i++) {

            var total_app = response[i].total_app;

            if (total_app <= 10 && total_app > 0) {
                tableLength = total_app;
                showfrom = 1;
            }
            else if (total_app > 10 && selectvalue == 10) {
                tableLength = 10;
                showfrom = 1;
            }
            else if (total_app > 25 && selectvalue == 25) {
                tableLength = 25;
                showfrom = 1;
            }
            else if (total_app < 25 && selectvalue == 25) {
                tableLength = total_app;
                showfrom = 1;
            }
            else if (total_app > 50 && selectvalue == 50) {
                tableLength = 50;
                showfrom = 1;
            }
            else if (total_app < 50 && selectvalue == 50) {
                tableLength = total_app;
                showfrom = 1;
            }
            else if (total_app > 100 && selectvalue == 100) {
                tableLength = 100;
                showfrom = 1;
            }
            else if (total_app < 100 && selectvalue == 100) {
                tableLength = total_app;
                showfrom = 1;
            }
            else if (total_app == 0) {
                showfrom = 0;
            }
            var text = "Showing " + showfrom + "  to " + tableLength + " of " + total_app + " entries";
        }


        $("#table_info").text(text);


    }

    // search in table
    $("#insearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();

        $("#pay_table tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            $("#table_info").hide();
        });
        if (value == "") {
            Appointments();
            $("#table_info").show();
        }



    });

    sort()
    // function sort
    function sort() {
        $(document).on('click', '.doctor', function () {
            $(".sort").css('opacity', '20%');
            $(".doctor i").css('opacity', '100%');
            columSort = "doctor_full_name ASC";
            Payments();
        });
        $(document).on('click', '.patient', function () {

            $(".sort").css('opacity', '20%');
            $(".patient i").css('opacity', '100%');
            columSort = "patients_full_name ASC";
            Payments();
        });
        $(document).on('click', '.app_date', function () {

            $(".sort").css('opacity', '20%');
            $(".app_date i").css('opacity', '100%');
            columSort = "appointments.date desc";
            Payments();
        });
        $(document).on('click', '.pay_date', function () {

            $(".sort").css('opacity', '20%');
            $(".pay_date i").css('opacity', '100%');
            columSort = "payments.pay_date DESC";
            Payments();
        });
        $(document).on('click', '.amount', function () {

            $(".sort").css('opacity', '20%');
            $(".amount i").css('opacity', '100%');
            columSort = "payments.pay_amount desc";
            Payments();
        });
    }

    /*    button submit form validation//////////////*/
    $(document).on('click', '#submit_payment', function () {

        var app_number = $('#app_no').val();


        var t = app_number.match(/\d+/g);

        if (app_number == '') {
            $('#p0').show();
            $('#p0').text('* Please Enter Appointment number');
            return false;
        }
        else if (!app_number.includes('App')) {
            $('#p0').show();
            $('#p0').text('* Incorrect Appointment number');
            return false;
        }
        else if (!t) {
            $('#p0').show();
            $('#p0').text('* Incorrect Appointment number');
            return false;
        }
        else {
            $('#p0').hide();
        }

        CheckIfAppInDB(app_number);


    });
    $(document).on('click', '#cancel_p', function () {

        $("#myModal").modal('toggle');


    });


    function CheckIfAppInDB(app_number) {
        app_number = app_number.substring(3);
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_payments.php",
            data: { op: op, app_number: app_number },
            dataType: 'json',
            timeout: 5000,
            success: function (response) {
                if (response == 0) {
                    $('#p0').show();
                    $('#p0').text('* This appointment doesn`t match');
                    return false;
                }
                else {
                    CheckIfAppHasPayment(app_number);
                }
            },
        });

    }
    function CheckIfAppHasPayment(app_number) {
        var op = 3;
        /* app_number = app_number.substring(3);*/
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_payments.php",
            data: { op: op, app_number: app_number },
            dataType: 'json',
            timeout: 5000,
            success: function (response) {
                if (response == 0) {
                    $('#p0').show();
                    $('#p0').text('* This appointment has payment');
                    return false;
                }
                else {
                    AddPayment(app_number);
                    $("#myModal").modal('toggle');
                }

            },
        });

    }
    function AddPayment(app_number) {

        var op = 5;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_payments.php",
            dataType: 'json',
            data: { op: op, app_number: app_number },
            success: function (response) {
                Payments();
            },
        });



    }




    $(document).on('click', '.view', function () {
        var pay_id = $(this).attr("id");
        pay_id = pay_id.substring(4);

        window.location.href = "./invoice.php?pay_id=" + pay_id;

    });
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