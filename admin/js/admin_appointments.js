

$(document).ready(function () {



    /// call function to get data from database 
    sort();
    show_entries();
    filterbydate();
    Edit();
    Update();
    deactivateAppointment();
    activateAppointment();
    //get appointments today 


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


    //convert time to 24 hours
    function Converttimeformatto24(time) {

        var hrs = Number(time.match(/^(\d+)/)[1]);

        var mnts = Number(time.match(/:(\d+)/)[1]);

        var format = time.match(/\s(.*)$/)[1];

        if (format == "PM" && hrs < 12) hrs = hrs + 12;

        if (format == "AM" && hrs == 12) hrs = hrs - 12;

        var hours = hrs.toString();

        var minutes = mnts.toString();

        if (hrs < 10) hours = "0" + hours;

        if (mnts < 10) minutes = "0" + minutes;

        return hours + ":" + minutes;
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



    var columSort = "appointments.date ASC";
    Appointments();

    function Appointments() {




        tableInfo();

        $(".empty").hide();
        var filterdate;
        var op = 3;
        //request to get data
        var datefromcalendar = $("#datefromcalendar").val();

        var filterdate = $("#filterdate").val();
        if (datefromcalendar) {
            filterdate = datefromcalendar;
        }


        var showNumber = $("#show_entries").val();

        var datetoday = getDateToday();
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            data: { op: op, showNumber: showNumber, colum: columSort, filterdate: filterdate, datetoday, datetoday },

            dataType: 'json',
            timeout: 5000,
            success: function (response, textStatus, xhr) {

                if (!response) {
                    $(".reload").hide();
                    $(".empty").show();
                    $("#app_tbody").empty();
                }
                else {
                    $(".reload").hide();
                    $(".empty").hide();
                    data = JSON.parse(xhr.responseText);
                    parseAppointments(response);


                }
            },
            error: function (xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
    }
    //parse appointments today 
    function parseAppointments(response) {
        $("#app_tbody").empty();
        var len = response.length;

        for (var i = 0; i < len; i++) {

            var app_id = response[i].app_id;
            var doctor_full_name = response[i].doctor_full_name;
            var patients_full_name = response[i].patients_full_name;
            var start_time = response[i].start_time;
            var end_time = response[i].end_time;
            var date = response[i].date;
            var status = response[i].status;
            var doctor_id = response[i].doctor_id;
            var patient_id = response[i].patient_id;
            var row = "<tr  id='" + app_id + "'>";
            row += "<td>App" + app_id + "</td>";
            row += "<td id='doctor_" + doctor_id + "' ><a class='profile_link'  href='../doctors/view_doctor_profile.php?doctor_id=" + doctor_id + "'>" + doctor_full_name + "</a>   </td>";
            row += "<td id='doctor_" + patient_id + "' ><a class='profile_link' href='../patients/view_patient_profile.php?patient_id=" + patient_id + "'>" + patients_full_name + "</a>  </td>";
            row += "<td data-target='data_date' >" + date + "</td>";
            row += "<td data-target='data_start_time' id=" + start_time + "  class='start_time'>" + start_time + "</td>";
            row += "<td data-target='data_end_time' class='end_time'>" + end_time + "</td>";
            row += "<td class='data_status" + app_id + "'>" + getstautus(status) + "</td>";
            row += "<td>"
                + "<button class='Asave action btn name='save' id='save" + app_id + "' style='display:none'><i class='fas  fa-save'></i></button>"
                + "<button class='action btn  Aedit' name='edit' id='edit_" + app_id + "' ><i class='fas  fa-edit'></i></button><button id='del_" + app_id + "' class='delete btn action'><i class='fas fa-trash'></i></button><button' id = 'act_" + app_id + "' class='activate btn action'> <i class='far fa-check-circle'></i></button></td></td>";
            row += "</tr>";
            $("#app_tbody").append(row);

            hideButtonDeactivate(app_id, status);

        }


    }

    function filterbydate() {
        $("#filterdate").change(function () {

            $("#datefromcalendar").val('');
            Appointments();
            tableInfo();
        });
    }




    // show number entries
    function show_entries() {
        $("#show_entries").change(function () {
            Appointments();

            tableInfo();

        })
    }


    function hideButtonDeactivate(id, status) {

        if (status == 1) {
            $("#act_" + id).hide();
            $("#del_" + id).show();
        }
        else {
            $("#del_" + id).hide();
            $("#act_" + id).show();
        }
    }

    //get appointments status
    function getstautus(status) {
        if (status == 1) {

            return "<i class='fas fa-clipboard-check'></i>";
        }
        else {


            return "<i class='far fa-calendar-times'></i>";
        }
    }


    //onclick edit
    function Edit() {
        $(document).on('click', '.Aedit', function () {


            var app_date = $(this).parents("tr").find("td:eq(3)").text();
            app_date = app_date.substring(10, 0);

            var app_time = $(this).parents("tr").find("td:eq(4)").text();

            var id = $(this).attr("id");
            idbtn = "save" + id.substring(5);
            $(this).hide();
            $("#" + idbtn).show();
            id = id.substring(5);
            $(this).parents("tr").find("td:eq(3)").html('<select class="form-control selectedit" id="edit_date' + id + '" ></select>');
            $(this).parents("tr").find("td:eq(4)").html('<select class="form-control selectedit"  id="edit_start_time' + id + '" ></select>');


            var doctor_id = $(this).parents("tr").find("td:eq(1)").attr("id");

            doctor_id = doctor_id.substring(7);
            changedateinselectUpdate(doctor_id, id, app_date, app_time);

            getdatescheduledoctortoedit(doctor_id, id, app_date);

            getdoctorSchedueltimeupdate(doctor_id, id, app_date, app_time);
        
            getDoctorSessionDuration(doctor_id);
        });
    }

    //get date from db for update it in table
    function getdatescheduledoctortoedit(doctor_id, app_id, app_date) {
        var date = getDateToday();

        var op = 12;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id, date: date },
            success: function (response) {

                parsedatescheduledoctortoedit(response, app_id, app_date);
            },
        });
    }

    function parsedatescheduledoctortoedit(response, app_id, app_date) {
        var len = response.length;
        var item = " ";
        for (var i = 0; i < len; i++) {
            var date = response[i].date;
            item = "<option value='" + date + "'>" + date + "</option>";

            $("#edit_date" + app_id).append(item);

        }
        $("#edit_date" + app_id).val(app_date);

    }


    //on change select dates in the table
    function changedateinselectUpdate(doctor_id, app_id, dateINtable, timeINtable) {


        $("#edit_date" + app_id + "").change(function () {

            $("#edit_start_time" + app_id).empty();
            var date = $("#edit_date" + app_id + "").val();
            getdoctorSchedueltimeupdate(doctor_id, app_id, date, timeINtable);
        });


    }



    //get doctor scheduel time for update it in table
    function getdoctorSchedueltimeupdate(doctor_id, app_id, app_date, timeINtable) {
        var date = $("#edit_date" + app_id).val();

        if (date == null) {
            date = app_date;
        }
        var op = 15;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id, date: date },
            success: function (response) {
                var finalTime = Converttimeformatto24(timeINtable);

                $("#edit_start_time" + app_id).append("<option value='" + finalTime + "'>" + timeINtable + "</option>");
               
                parsedoctorSchedueltimeupdate(response, app_id, timeINtable);
            },
        });

    }
    //parse  doctor scheduel time for update it in table
    function parsedoctorSchedueltimeupdate(response, app_id, timeINtable) {
        var selectdate = $("#edit_date" + app_id).val();
        var todaydate = getDateToday();
        var curenttime = getcurrenttime();


        if (response.length == 0 ) {
            var finalTime = Converttimeformatto24(timeINtable);

            $("#edit_start_time" + app_id).append("<option value='" + finalTime + "'>" + timeINtable + "</option>");
            var item = "<option disabled>Blank Schedule</option>";
            $("#edit_start_time" + app_id).append(item);
        }
        

        else {
            $.each(response, function (index, value) {
                var time = response[index];
                var finalTimeview = tConverttoAMPM(time);

                var item = "<option value='" + time + "'>" + finalTimeview + "</option>";
                $("#edit_start_time" + app_id).append(item);

            });

            $("#edit_start_time" + app_id+" option").each(function () {

                var alloptions = $(this).val();

                if (selectdate == todaydate && curenttime > alloptions) {

                    $("#edit_start_time" + app_id).find("[Value='" + alloptions + "']").remove();


                }
            });
            if ($("#edit_start_time" + app_id + " option").length == 0) {
                var item = "<option disabled>Blank Schedule</option>";
                $("#edit_start_time" + app_id).append(item);
                if (selectdate == todaydate) {
                    var finalTime = Converttimeformatto24(timeINtable);
                    $("#edit_start_time" + app_id).empty();
                    var finalTime = Converttimeformatto24(timeINtable);

                    $("#edit_start_time" + app_id).append("<option value='" + finalTime + "'>" + timeINtable + "</option>");
                    var item = "<option disabled>Blank Schedule</option>";
                    $("#edit_start_time" + app_id).append(item);
                }
            }





        }
    }
   


    // function sort

    function sort() {
        $(document).on('click', '.doctor', function () {

            $(".sort").css('opacity', '20%');
            $(".doctor i").css('opacity', '100%');
            columSort = "doctor_full_name ASC";
            Appointments();
        });
        $(document).on('click', '.patient', function () {

            $(".sort").css('opacity', '20%');
            $(".patient i").css('opacity', '100%');
            columSort = "patients_full_name ASC";
            Appointments();
        });
        $(document).on('click', '.starttime', function () {

            $(".sort").css('opacity', '20%');
            $(".starttime i").css('opacity', '100%');
            columSort = "appointments.start_time ASC";
            Appointments();
        });
        $(document).on('click', '.endtime', function () {

            $(".sort").css('opacity', '20%');
            $(".endtime i").css('opacity', '100%');
            columSort = "appointments.end_time DESC";
            Appointments();
        });
        $(document).on('click', '.status', function () {

            $(".sort").css('opacity', '20%');
            $(".status i").css('opacity', '100%');
            columSort = "appointments.status ASC";
            Appointments();
        });
        $(document).on('click', '.date', function () {
            $(".sort").css('opacity', '20%');
            $(".date i").css('opacity', '100%');
            columSort = "appointments.date DESC";
            Appointments();
        });

    }


    function Update() {
        $(document).on('click', '.Asave', function () {
            var id = $(this).attr("id");
            var idbtn = "edit_" + id.substring(4);


            id = id.substring(4);
            var date = $(this).parents("tr").find('select[id="edit_date' + id + '"]').val();
            var starttime = $(this).parents("tr").find('select[id="edit_start_time' + id + '"]').val();
            var duration = $("#duration").val();

            var endtime = addDurationTostarttime(starttime, duration);
            $(this).hide();
            $("#" + idbtn).show();
            $('#p5').hide();
            var op = 6;
            var searchvalue = $("#insearch").val();




            $.ajax({
                type: 'GET',
                url: "./ws/ws_admin_appointments.php",
                dataType: 'json',
                data: { op: op, id: id, starttime: starttime, endtime: endtime, date: date },
                success: function (response) {
                    if (searchvalue) {
                        starttime = tConverttoAMPM(starttime);

                        $('#' + id).find("td:eq(3)").text(date);
                        $('#' + id).find("td:eq(4)").text(starttime);

                    }
                    else {
                        starttime = tConverttoAMPM(starttime);

                        $('#' + id).find("td:eq(3)").text(date);
                        $('#' + id).find("td:eq(4)").text(starttime);
                        Appointments();
                    }

                },
            });



        });

    }

    //table info
    function tableInfo() {
        var datefromcalendar = $("#datefromcalendar").val();

        var filterdateinfo = $("#filterdate").val();
        if (datefromcalendar) {
            filterdateinfo = datefromcalendar;
        }

        var datetoday = getDateToday();
        var op = 4;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            dataType: 'json',
            data: { op: op, filterdateinfo: filterdateinfo, datetoday: datetoday },
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


    function deactivateAppointment() {
        $(document).on('click', '.delete', function () {
            var accept = confirm("Are you sure you want to deactivate this appointment?");
            var id = $(this).attr("id");
            id = id.substring(4);
            var status = 0;
            var searchvalue = $("#insearch").val();
            if (accept) {
                updatestatus(id, status);

            }
            else {
                return false;
            }


        });
    }

    function activateAppointment() {
        $(document).on('click', '.activate', function () {
            var accept = confirm("Are you sure you want to activate this appointment?");
            var id = $(this).attr("id");
            id = id.substring(4);
            var status = 1;
            var searchvalue = $("#insearch").val();
            if (accept) {
                updatestatus(id, status);

            }
            else {
                return false;
            }

        });
    }
    function updatestatus(id, status) {
        var op = 7;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            dataType: 'json',
            data: { op: op, id: id, status: status },
            success: function (data) {


            },
        });
        $('.data_status' + id).html(getstautus(status));
        hideButtonDeactivate(id, status);
    }

    //get patients and doctors to modal select option
    getDoctors();
    getPatients();

    function getDoctors() {
        var op = 8;
        var date = getDateToday();
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            dataType: 'json',
            data: { op: op, date: date},
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
    function getPatients() {
        var op = 9;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            dataType: 'json',
            data: { op: op },
            success: function (response) {

                parsepatients(response);
            },
        });
    }
    function parsepatients(response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
            var patients_name = response[i].patient_full_name;
            var patient_id = response[i].patient_id;
            var item = "<option data-patient-id='" + patient_id + "' value=" + patients_name + ">" + patients_name + "</option>";
            $("#selectpatient").append(item);

        }
    }

    // search in table
    $("#insearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();

        $("#App_table tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            $("#table_info").hide();
        });
        if (value == "") {
            Appointments();
            $("#table_info").show();
        }



    });

    $(".empty").hide();



    $("#myModal").on('hidden.bs.modal', function () {


        $(this).find("form").trigger('reset');
        $("#appointment_start_time").empty();
        var item = "<option value=''>  Start Time  </option>";
        $("#appointment_start_time").append(item);


    });
    $("#myModal").on('submit', function () {

        return false;
    });
    $(document).on('click', '#cancel_p', function () {
        $("#myModal").modal('toggle');
        return false;

    });



    function getDoctorSessionDuration(doctor_id) {
        var op = 11;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
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
        $("#durationtable").val(session_duration);
        return session_duration;
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

    function addDurationTostarttime(appointment_start_time, duration) {
        /* Time to be added in min*/
        var timeToAddArr = duration;

        var ms = (60 * timeToAddArr) * 1000;
        var newTime = new Date('1970-01-01T' + appointment_start_time).getTime() + ms
        var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12, 20)
        return finalTime;
    }


    /*    button submit form validation//////////////*/
    $(document).on('click', '#submit_appointment', function () {

        var selectdoctor = $('#selectdoctorvalue').val();
        var selectpatient = $('#selectpatientvalue').val();
        var appointment_date = $('#appointment_date').val();
        var appointment_start_time = $('#appointment_start_time').val();
        /*        var appointment_end_time = $('#appointment_end_time').val();*/
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
        if (selectpatient == '') {
            $('#p1').show();
            $('#p1').text('* Please select Patient');
            return false;
        }
        else if (selectpatient != '0') {
            $('#p1').hide();
            selectpatient = $('#selectpatient option[value=' + selectpatient + ']').attr('data-patient-id');
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

        var finalTime = addDurationTostarttime(appointment_start_time, duration);


        if ($('#paid').is(':checked')) {
            var sattus_paid = 1;
        }
        else {

            var sattus_paid = 0;
        }



        addAppointment(selectdoctor, selectpatient, appointment_date, appointment_start_time, finalTime,sattus_paid);




        $("#appointment_start_time").empty();
        var item = "<option value=''>  Start Time  </option>";
        $("#appointment_start_time").append(item);
        $("#myModal").modal('toggle');


        return false;


    });


    //add app to ws//////////////////
    function addAppointment(selectdoctor, selectpatient, appointment_date, appointment_start_time, appointment_end_time,sattus_paid) {
        var op = 10;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            data: { op: op, selectdoctor: selectdoctor, selectpatient: selectpatient, appointment_date: appointment_date, appointment_start_time: appointment_start_time, appointment_end_time: appointment_end_time, sattus_paid: sattus_paid },
            cache: false,
            success: function (response) {
                Appointments();
            },
        });
    }



    //get doctor schedule date in modal
    function getdoctorSchedueldate(doctor_id) {
        var date = getDateToday();
        var op = 12;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
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




        
        var op = 15;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
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