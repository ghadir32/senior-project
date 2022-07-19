

$(document).ready(function () {

    TotalLastWeekAppointment();
    TotalAppointmentTillDate();
    TotalPatients();

    //return 0 if <10 
    function pad(n) {
        return (n < 10 ? '0' : '') + n;
    }


    function tConverttoAMPM(time) {
        // Check correct time format and split into components
        time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

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



 // converting Date String to Javascript Date Format
    function dayname(dateString) {
        let day = new Date(dateString).getDay();
        let dayName;
        if (day == 0) {
            dayName = 'Sunday'
        } else if (day == 1) {
            dayName = 'Monday'
        } else if (day == 2) {
            dayName = 'Tuesday'
        } else if (day == 3) {
            dayName = 'Wednesday'
        } else if (day == 4) {
            dayName = 'Thursday'
        } else if (day == 5) {
            dayName = 'Friday'
        } else {
            dayName = 'Saturday'
        }
        return dayName;
        /*console.log(`Day : ${dayName} Month: ${month + 1} Year : ${year}`)*/
    }
    //get date today
    function getDateToday() {
        var date = new Date();
        var month = pad(date.getMonth() + 1);
        var day = pad(date.getDate());
        var year = date.getFullYear();
        let dateString = month + "/" + day + "/" + year;
        var namedate = dayname(dateString);
        var dateformat = day+ "/" +  month+ "/" + year;
        
        var date = namedate + " " + dateformat;
        $("#datetoday").text(date);


        var date_data = year + "-" + month + "-" + day;
        return date_data;

    }


    //total Today Appointments
    function TotalTodayAppointment() {
        var Startdate = getDateToday();
        var Enddate = Startdate;

        var op = 1;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_admin_dashboard.php",
                dataType: 'json',
                data: { op: op, Startdate: Startdate, Enddate: Enddate },
                success: function (data) {
                    ParseTodayAppointments(data);
                    
                },
            });

    }
    //parse in card today total appointments
    function ParseTodayAppointments(data) {
        var len = data.length;

        for (var i = 0; i < len; i++) {
            var total = data[i].total_app;
        }
        $("#TodayAppointment").text(total);
    }

    //total Tommorow Appointments
    function TotalTomorrowAppointment() {
        var date = new Date();
        var month = pad(date.getMonth() + 1);
        var day = pad(date.getDate() + 1);
        var year = date.getFullYear();

        var Startdate = year + "-" + month + "-" + day;
        var Enddate = Startdate;
        var op = 1;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_admin_dashboard.php",
                dataType: 'json',
                data: { op: op, Startdate: Startdate, Enddate: Enddate },
                success: function (data) {
                    ParseTomorrowAppointments(data);
                   
                },

            });
       

    }
    //parse in card tommorow total appointments
    function ParseTomorrowAppointments(data) {
        var len = data.length;

        for (var i = 0; i < len; i++) {
            var total = data[i].total_app;
        }
        $("#TomorrowAppointment").text(total);
    }


    //total last week till date Appointments
    function TotalLastWeekAppointment() {
        var date = new Date();
        var month = pad(date.getMonth() + 1);
        var dayt = pad(date.getDate());
        var year = date.getFullYear();
        var dayw = pad(date.getDate()-7);
        var Startdate = year + "-" + month + "-" + dayt;
        var Enddate = year + "-" + month + "-" + dayw;

        var op = 1;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_admin_dashboard.php",
                dataType: 'json',
                data: { op: op, Startdate: Startdate, Enddate: Enddate },
                success: function (data) {
                    ParseLastWeekAppointments(data);
                   
                },

            });

    }
     //parse in card last week till date total appointments
    function ParseLastWeekAppointments(data) {
        var len = data.length;

        for (var i = 0; i < len; i++) {
            var total = data[i].total_app;
        }
        $("#LastWeekAppointment").text(total);
    }


    //total till date Appointments
    function TotalAppointmentTillDate() {

        var Startdate = getDateToday();
        var Enddate = 0;

        var op = 1;

            $.ajax({
                type: 'GET',
                url: "./ws/ws_admin_dashboard.php",
                dataType: 'json',
                data: { op: op, Startdate: Startdate, Enddate: Enddate },
                success: function (data) {
                    ParseTotalAppointmentsTillDate(data);
                    
                },
            });

    }
     //parse in card till date total appointments
    function ParseTotalAppointmentsTillDate(data) {
        var len = data.length;

        for (var i = 0; i < len; i++) {
            var total = data[i].total_app;
        }
        $("#TotalAllAppointment").text(total);
    }


    //total patients 
    function TotalPatients() {

        var op = 2;

            $.ajax({
                type: 'GET',
                url: "./ws/ws_admin_dashboard.php",
                dataType: 'json',
                data: { op: op },
                success: function (data) {
                    ParseTotalPatients(data);
                    
                },
            });
    }
    //parse totoal patients
    function ParseTotalPatients(data) {
        var len = data.length;

        for (var i = 0; i < len; i++) {
            var total = data[i].total_patients;
        }
        $("#TotalPatients").text(total);
    }
  



    /// call function to get data from database sorted and always up to date
    var columSort = "appointments.app_id ASC";
    var AutoTableUpdate = setInterval(AppointmentsToday,1000);
    sort();
    show_entries();
    EditTime();
    UpdateTime();
    deactivateAppointment();
    activateAppointment();
    //get appointments today 

    function AppointmentsToday() {

        TotalTodayAppointment();
        TotalTomorrowAppointment();

        $(".empty").hide();

        var date = getDateToday();
        var op = 3;
        //request to get data


        var showNumber = $("#show_entries").val();


        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_dashboard.php",
            data: { op: op, today_date: date, showNumber: showNumber, colum: columSort },

            dataType: 'json',
            timeout: 5000,
            success: function (response, textStatus, xhr) {

                if (!response) {
                    clearInterval(AutoTableUpdate);
                    $(".reload").hide();
                    $(".empty").show();
                    $("#app_tbody").empty();
                }
                else {
                    $(".reload").hide();
                    $(".empty").hide();
                    data = JSON.parse(xhr.responseText);
                    parseAppointmentsToday(response);
                  
                    
                }
            },
            error: function (xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
        
        getDateToday();
        getcurrenttime();
        tableInfo();

        
    }



   

    //parse appointments today 
    function parseAppointmentsToday(response) {
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
            var row = "<tr  id='" + app_id + "'  >";
           
            row += "<td class='time_case" + app_id + "' >" + appointmentsignal(start_time, end_time, status) + "</td>";
            row += "<td>App" + app_id + "</td>";
            row += "<td id='doctor_" + doctor_id + "' ><a class='profile_link'  href='../doctors/view_doctor_profile.php?doctor_id=" + doctor_id + "'>" + doctor_full_name + "</a>  </td>";
            row += "<td id='doctor_" + patient_id + "' ><a class='profile_link'  href='../patients/view_patient_profile.php?patient_id=" + patient_id + "'>" + patients_full_name + "</a>  </td>";
            row += "<td data-target='data_start_time" + app_id + " ' class='start_time'>" + start_time + "</td>";
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

    
    // show number entries
    function show_entries() {
        $("#show_entries").change(function () {
            AppointmentsToday(columSort);
            
            tableInfo();
            
        })
    }


    

    //get current time
    function getcurrenttime() {
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        if (today.getHours() < 10) {
            time = "0" + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        }
        else if (today.getMinutes() < 10) {
                time =  today.getHours() + ":0" + today.getMinutes() + ":" + today.getSeconds();
        }

        return time;
      
    }


    function hideButtonDeactivate(id,status) {
        
        if (status == 1) {
            $("#act_" + id).hide();
            $("#del_" + id).show();
        }
        else {
            $("#del_" + id).hide();
            $("#act_" + id).show();
        }
    }


    //signal of appointment according to the start time and end time in current time
    function appointmentsignal(start_time, end_time, status) {
        
        start_time = Converttimeformatto24(start_time);
        end_time = Converttimeformatto24(end_time);

        var time = getcurrenttime();
            if (status == 1) {
                if (start_time <= time && end_time >= time) {
                    var statusicon = "<i class='fas fa-spinner fa-spin' data-signal='progress'></i>";
                }
                else if (start_time >= time) {
                    var statusicon = "<i class='fas fa-clock' data-signal='wait'></i>";
                }
                else if (end_time <= time) {
                    var statusicon = "<i class='fas fa-check-circle' data-signal='finish'></i>";
                }
            }
            else {
                
                statusicon = "<i class='fas fa-ban'></i>";
            }
        return statusicon;
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


    //get time from dd
    function EditTime() {
        $(document).on('click', '.Aedit', function () {
            clearInterval(AutoTableUpdate);
            var app_time = $(this).parents("tr").find("td:eq(4)").text();



            var id = $(this).attr("id");
            idbtn ="save"+ id.substring(5);
            $(this).hide();
            $("#" + idbtn).show();
            id = id.substring(5);
            $(this).parents("tr").find("td:eq(4)").html('<select class="form-control selectedit" id="edit_start_time' + id + '" ></select>');

            var doctor_id = $(this).parents("tr").find("td:eq(2)").attr("id");

            doctor_id = doctor_id.substring(7);

            getdoctorSchedueltimeupdate(doctor_id, id, app_time);
          

            getDoctorSessionDuration(doctor_id);



        });
    }

    // get doctor Schedule time update
    function getdoctorSchedueltimeupdate(doctor_id, app_id, app_time) {
        
        var date = getDateToday();

        var op = 15;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_appointments.php",
            dataType: 'json',
            data: { op: op, doctor_id: doctor_id, date: date },
            success: function (response) {
                parsedoctorSchedueltimeupdate(response, app_id, app_time);
            },
        });
    }

    // parse doctor Schedule time update
    function parsedoctorSchedueltimeupdate(response, app_id, timeINtable){
        if (response.length == 0) {
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
            var selectdate = $("#edit_date" + app_id).val();
            var todaydate = getDateToday();
            var curenttime = getcurrenttime();
            $("#edit_start_time" + app_id + " option").each(function () {

                var alloptions = $(this).val();

                if (curenttime > alloptions) {

                    $("#edit_start_time" + app_id).find("[Value='" + alloptions + "']").remove();


                }
            });
            if ($("#edit_start_time" + app_id + " option").length == 0) {
                var finalTime = Converttimeformatto24(timeINtable);
                document.getElementById("edit_start_time" + app_id).insertBefore(new Option(timeINtable, finalTime), document.getElementById("edit_start_time" + app_id).firstChild);

                $("#edit_start_time" + app_id).val(finalTime);


                var item = "<option disabled>Blank Schedule</option>";
                $("#edit_start_time" + app_id).append(item);

            }
            else {
                var finalTime = Converttimeformatto24(timeINtable);
                document.getElementById("edit_start_time" + app_id).insertBefore(new Option(timeINtable, finalTime), document.getElementById("edit_start_time" + app_id).firstChild);

                $("#edit_start_time" + app_id).val(finalTime);
            }


        }
    }



    // function sort
    function sort() {
        $(document).on('click', '.doctor', function () {
            
            $(".sort").css('opacity', '20%');
            $(".doctor i").css('opacity', '100%');
            columSort = "doctor_full_name ASC";
            AppointmentsToday(columSort);
            $(".time_case i").css('transform', "rotate(0deg)");
            $(".time_case i").css('transition-duration', "0s");
        });
        $(document).on('click', '.patient', function () {
            
            $(".sort").css('opacity', '20%');
            $(".patient i").css('opacity', '100%');
            columSort = "patients_full_name ASC";
            AppointmentsToday(columSort);
            $(".time_case i").css('transform', "rotate(0deg)");
            $(".time_case i").css('transition-duration', "0s");
        });
        $(document).on('click', '.starttime', function () {
            
            $(".sort").css('opacity', '20%');
            $(".starttime i").css('opacity', '100%');
            columSort = "appointments.start_time ASC";
            AppointmentsToday(columSort);
            $(".time_case i").css('transform', "rotate(0deg)");
            $(".time_case i").css('transition-duration', "0s");
        });
        $(document).on('click', '.endtime', function () {
            
            $(".sort").css('opacity', '20%');
            $(".endtime i").css('opacity', '100%');
            columSort = "appointments.end_time DESC";
            AppointmentsToday(columSort);
            $(".time_case i").css('transform', "rotate(0deg)");
            $(".time_case i").css('transition-duration', "0s");
        });
        $(document).on('click', '.status', function () {
            
            $(".sort").css('opacity', '20%');
            $(".status i").css('opacity', '100%');
            columSort = "appointments.status ASC";
            AppointmentsToday(columSort);
            $(".time_case i").css('transform', "rotate(0deg)");
            $(".time_case i").css('transition-duration', "0s");
        });
        $(document).on('click', '.time_case', function () {
            $(".sort").css('opacity', '20%');
            columSort = "appointments.app_id ASC";
            AppointmentsToday(columSort);
            $(".time_case i").css('transform', "rotate(360deg)");
            $(".time_case i").css('transition-duration', "1s");
            $("#insearch").val("");
            tableInfo();
        });
        
    }



   // get doctor duration
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
    }





    function UpdateTime() {
        $(document).on('click', '.Asave', function () {
        
            var id = $(this).attr("id");
            var idbtn = "edit_" + id.substring(4);
            $(this).hide();
            $("#" + idbtn).show();
            id = id.substring(4);


            var starttime = $('#edit_start_time' + id + '').val();
          
            var op = 6;
            var duration = $("#duration").val();

            var endtime = addDurationTostarttime(starttime, duration);
            
                var op = 6;
                var searchvalue = $("#insearch").val();

                $.ajax({
                    type: 'GET',
                    url: "./ws/ws_admin_dashboard.php",
                    dataType: 'json',
                    data: { op: op, id: id, starttime: starttime, endtime: endtime },
                    success: function (response) {
                        if (searchvalue) {
                            starttime = tConverttoAMPM(starttime);
                            $('#' + id).find("td:eq(4)").text(starttime);
                        }
                        else {
                            starttime = tConverttoAMPM(starttime);
                            $('#' + id).find("td:eq(4)").text(starttime);

                                AutoTableUpdate = setInterval(AppointmentsToday, 1000);
                            
                            
                        }

                    },
                });
              
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
    //table info
    
    function tableInfo() {
        var today_date = getDateToday();
        var op = 4;

            $.ajax({
                type: 'GET',
                url: "./ws/ws_admin_dashboard.php",
                dataType: 'json',
                data: { op: op, today_date: today_date },
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

            if (total_app <= 10 && total_app>0) {
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
            else if (total_app==0) {
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
            url: "./ws/ws_admin_dashboard.php",
            dataType: 'json',
            data: { op: op, id: id, status: status },
            success: function (data) {
                $('#' + id).children('td[data-target=status]').text(getstautus(status));

            },
        });
        $('.data_status' + id).html(getstautus(status));
        hideButtonDeactivate(id, status);
        
    }

    // search in table
    $("#insearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();

        $("#App_table tbody tr").filter(function () {
            var filtr = $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            clearInterval(AutoTableUpdate);
        });
        if (value=="") {
            AutoTableUpdate = setInterval(AppointmentsToday, 1000);
        }

    });

    $(".empty").hide();



    $(document).on('click', '#logout', function () {

        var op = 3;
        $.ajax({
            type: 'GET',
            url: "../login_register/ws/users_ws.php",
            dataType: 'json',
            data: { op: op},
            success: function (response) {
                window.location.href = "../login_register/login.php";
            },
        });

    });

    
});

