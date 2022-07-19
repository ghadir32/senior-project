

$(document).ready(function () {
    var patient_id = $("#user_id").val();




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
    //convert to AM PM
    function tConverttoAMPM(time) {
        // Check correct time format and split into components
        time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
        var timeinPMAM
        if (time.length > 1) { // If time format correct
            time = time.slice(1);  // Remove full string match value
            time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
            time[0] = +time[0] % 12 || 12; // Adjust hours

        }
        if (time[0] < 10) {
            timeinPMAM = "0" + time.join('');
        }
        else {
            timeinPMAM = time.join('');
        }




        return timeinPMAM;// return adjusted time or original string
    }
    //get current time
    function getcurrenttime() {
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        if (today.getHours() < 10) {
            time = "0" + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        }
        else if (today.getMinutes() < 10) {
            time = today.getHours() + ":0" + today.getMinutes() + ":" + today.getSeconds();
        }

        return time;

    }

    getDoctors();
    function getDoctors() {
        var op = 1;
        var date = getDateToday();


        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_make_appointment.php",
            dataType: 'json',
            data: { op: op, date: date },
            success: function (response) {
                parsedoctors(response);

            },
        });
    }
    function parsedoctors(response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
            var doctors_name = response[i].doctor_full_name;
            var doctor_id = response[i].doctor_id;
            var item = "<option data-doctor-id='" + doctor_id + "' value=" + doctors_name + ">" + doctors_name + "</option>";

            $("#selectdoctor").append(item);

        }
    }

        //get doctor schedule date in modal
    function getdoctorSchedueldate(doctor_id) {
        var date = getDateToday();
        var op = 3;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_make_appointment.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id, date: date },
            success: function (response) {

                parsedoctorSchedueldate(response);
            },
        });
    }
    //parse doctor schedule date in modal
    function parsedoctorSchedueldate(response) {
        var len = response.length;
        var item = " ";
        for (var i = 0; i < len; i++) {
            var date = response[i].date;
            item = "<option value='" + date + "'>" + date + "</option>";

            $("#appointment_date").append(item);

        }
    }

     $("#selectdoctorvalue").change(function () {
        $("#appointment_date").empty();
        var selectdoctor = $('#selectdoctorvalue').val();
        var item = "<option value=''>  Date  </option>";
        $("#appointment_date").append(item);


        $("#appointment_start_time").empty();
        var item = "<option value=''>  Start Time  </option>";
        $("#appointment_start_time").append(item);


        if (selectdoctor != '') {
            selectdoctor = $('#selectdoctor option[value=' + selectdoctor + ']').attr('data-doctor-id');
            getDoctorSessionDuration(selectdoctor);
            getdoctorSchedueldate(selectdoctor);

        }

    });

    function getDoctorSessionDuration(doctor_id) {
        var op = 2;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_make_appointment.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id },
            success: function (response) {
                parseDoctorSessionDuration(response);

            },
        });

    }
    function parseDoctorSessionDuration(response) {

        var len = response.length;

        for (var i = 0; i < len; i++) {
            var session_duration = response[i].session_duration;
        }
        $("#duration").val(session_duration);
        return session_duration;
    }

    $("#appointment_date").change(function () {

        var selectdoctor = $('#selectdoctorvalue').val();

        if (selectdoctor != '') {
            selectdoctor = $('#selectdoctor option[value=' + selectdoctor + ']').attr('data-doctor-id');
            getdoctorSchedueltime(selectdoctor);

        }
    });


    //get doctor schedule time in modal
    function getdoctorSchedueltime(doctor_id) {
        var date = $("#appointment_date").val();
        var duration = $("#duration").val();

        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_make_appointment.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id, date: date, duration: duration },
            success: function (response) {
                $("#appointment_start_time").empty();
                parsedoctorSchedueltime(response);


            },
        });
    }
    //parse doctor schedule time in modal
    function parsedoctorSchedueltime(response) {

        if (response.length == 0) {
            var item = "<option disabled>Blank Schedule</option>";
            $("#appointment_start_time").append(item);
        }

        else {
            $.each(response, function (index, value) {
                var time = response[index];
                var finalTimeview = tConverttoAMPM(time);

                var item = "<option value='" + time + "'>" + finalTimeview + "</option>";




                $("#appointment_start_time").append(item);

            });
            var selectdate = $("#appointment_date").val();
            var todaydate = getDateToday();
            var curenttime = getcurrenttime();
            $("#appointment_start_time option").each(function () {

                var alloptions = $(this).val();

                if (selectdate == todaydate && curenttime > alloptions) {

                    $("#appointment_start_time").find("[Value='" + alloptions + "']").remove();


                }
            });
            if ($("#appointment_start_time option").length == 0) {
                var item = "<option disabled>Blank Schedule</option>";
                $("#appointment_start_time").append(item);
            }
        }



    }



    $(document).on('click', '#book_now', function () {

        var selectdoctor = $('#selectdoctorvalue').val();
        var selectpatient = $('#selectpatientvalue').val();
        var appointment_date = $('#appointment_date').val();
        var appointment_start_time = $('#appointment_start_time').val();
        var duration = $("#duration").val();

        var todaydate = getDateToday();
        var curenttime = getcurrenttime();

        if (selectdoctor == '') {
            $('#p0').show();
            $('#p0').text('* Please select Doctor');
            return false;
        }
        else if (selectdoctor != '') {
            selectdoctor = $('#selectdoctor option[value=' + selectdoctor + ']').attr('data-doctor-id');
            $('#p0').hide();
        }
        if (appointment_date == '') {
            $('#p2').show();
            $('#p2').text('* Please select Appointment Date');
            return false;
        }
        else if (appointment_date != '') {

            if (appointment_date < todaydate) {
                $('#p2').text('* This date has passed');
                return false;
            }
            $('#p2').hide();
        }
        if (!appointment_start_time) {
            $('#p3').show();
            $('#p3').text('* Please enter Appointment Start Time');
            return false;
        }
        else if (appointment_start_time.length > 0) {
            if (appointment_date == todaydate && appointment_start_time < curenttime) {
                $('#p3').text('* This time has passed');
                if (appointment_date < todaydate) {
                    $('#p2').text('* This date has passed');
                    return false;
                }
                return false;
            }
            $('#p3').hide();
        }

        getappointmentinfo(selectdoctor);
        $("#myModal").modal('show');

        return false;
    });


    function getappointmentinfo(doctor_id) {



        var op = 5;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_make_appointment.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id},
            success: function (response) {
                parsegetappointmentinfo(response);
            },
        });

    }
    function parsegetappointmentinfo(response) {
        var doctor_name = response[0].doctor_full_name;

        var doctor_image = response[0].doctor_image;
        
        var price = response[0].session_price;
        var time = $("#appointment_start_time").val();


        time = tConverttoAMPM(time);
        var date = $("#appointment_date").val();

        $("#Doctor_name_info").append(doctor_name);

        $("#Doctor_image_info").attr("src", "../images/" + doctor_image+"");

        
        $("#appointment_date_info").append(date);
        $("#appointment_time_info").append(time);
        $("#session_price_info").append(price + "$");
        $("#session_price").val(price);
    }

    $("#myModal").on('hidden.bs.modal', function () {


        $(this).find("form").trigger('reset');
        $("#Doctor_name_info").empty();
        $("#appointment_date_info").empty();
        $("#appointment_time_info").empty();
        $("#session_price_info").empty();
    });
    $("#myModal").on('submit', function () {

        return false;
    });


    $(document).on('click', '#visa', function () {
        $("#pay_method_type").val("visa");
        $(this).addClass('foc');
        $("#mastercard").removeClass('foc');
        return false;

    });
    $(document).on('click', '#mastercard', function () {
        $("#pay_method_type").val("mastercard");
        $(this).addClass('foc');
        $("#visa").removeClass('foc');
    });

    $(document).on('click', '#checkout', function () {

        var pay_method_type = $('#pay_method_type').val();
        var card_number = $('#card_number').val();
        var password = $('#password').val();
        var email = $('#email').val();
        var phone = $("#phone").val();

        if (pay_method_type == '') {
            $('#p4').show();
            $('#p4').text('* Please Select Payment Method Type');
            return false;
        }
        else if (pay_method_type != '') {
            $('#p4').hide();
        }


        if (card_number == '') {
            $('#p5').show();
            $('#p5').text('* Please Your Card Number');
            return false;
        }
        else if (card_number != '') {
            $('#p5').hide();
        }



        if (password == '') {
            $('#p6').show();
            $('#p6').text('* Please enter Your Password');
            return false;
        }
        else if (password != '') {

            $('#p6').hide();
        }


        if (email == '') {
            $('#p7').show();
            $('#p7').text('* Please Your Email Registered');
            return false;
        }
        else if (email != '') {
            $('#p7').hide();
        }


        if (phone == '') {
            $('#p8').show();
            $('#p8').text('* Please Your Phone Number');
            return false;
        }
        else if (phone != '') {
            $('#p8').hide();
        }
        var selectdoctor = $('#selectdoctorvalue').val();
        var doctor_id = $('#selectdoctor option[value=' + selectdoctor + ']').attr('data-doctor-id');
        var appointment_date = $('#appointment_date').val();
        var appointment_start_time = $('#appointment_start_time').val();
        var duration = $("#duration").val();
        var finalTime = addDurationTostarttime(appointment_start_time, duration);

        var pay_amount = $("#session_price").val();





        Checkpatientinfo(pay_method_type, email, phone, patient_id, doctor_id, appointment_date, appointment_start_time, finalTime, pay_amount);
      
       

    });
    function Checkpatientinfo(pay_method_type, email, phone, patient_id, doctor_id, appointment_date, appointment_start_time, finalTime, pay_amount) {

        var op = 7;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_make_appointment.php",
            data: { op: op, patient_id: patient_id, email: email, phone: phone},
            dataType: 'json',
            timeout: 5000,
            success: function (response) {
                if (response == 0) {
                    $('#p8').show();
                    $('#p8').text('* Sorry you have entered wrong information ');
                    return false;
                }
                else {
                    $("#myModal").modal('hide');
                    addAppointment(pay_method_type, patient_id, doctor_id, appointment_date, appointment_start_time, finalTime, pay_amount);
                }

            },
        });

    }


    function addAppointment(pay_method_type, patient_id, doctor_id, appointment_date, appointment_start_time, finalTime, pay_amount) {
        var op = 6;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patient_make_appointment.php",
            data: { op: op, pay_method_type: pay_method_type, patient_id: patient_id, doctor_id: doctor_id, appointment_date: appointment_date, appointment_start_time: appointment_start_time, finalTime: finalTime, pay_amount: pay_amount },
            cache: false,
            success: function (response) {

                var msg = $("#msg").append("Appointment Booked");
                $("#msg").addClass("alert alert-success");

                setTimeout(function () {
                    msg.empty();
                    msg.hide();
                }, 2000);
                document.getElementById("form_app").reset();
                $('#appointment_date').empty();
                $('#appointment_start_time').empty();

                $('#appointment_date').append("<option>date</option>");
                $('#appointment_start_time').append("<option>Time</option>");
                
            },
        });
    }

    function addDurationTostarttime(appointment_start_time, duration) {
        /* Time to be added in min*/
        var timeToAddArr = duration;

        var ms = (60 * timeToAddArr) * 1000;
        var newTime = new Date('1970-01-01T' + appointment_start_time).getTime() + ms
        var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12, 20)
        return finalTime;
    }


});

