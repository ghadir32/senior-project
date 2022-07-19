

$(document).ready(function () {

    var columSort = "p_first_name ASC";
    AppendPatients();
    //return 0 if <10 
    function pad(n) {
        return (n < 10 ? '0' : '') + n;
    }


    //get date today
    function getDateToday() {
        var date = new Date();
            var month = pad(date.getMonth() + 1);
            var day = pad(date.getDate());
            var year = date.getFullYear();

        var date =  day+ "/" + month + "/" + year ;
        $("#datetoday").text(date);


        var date_data = year + "-" + month + "-" + day;
        return date_data;

    }



    sort();
   
    show_entries();
    //get patients 
    function AppendPatients() {
        $(".empty").hide();
        var date = getDateToday();  
        //request to get data


        var showNumber = $("#show_entries").val();


        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_patients.php",
            data: { op: 0, showNumber: showNumber, column: columSort},

            dataType: 'json',
            timeout: 5000,
            success: function (response, textStatus, xhr) {

                if (!response) {
                   
                    $(".empty").show();
                    $("#app_tbody").empty();
                }
                else {

                    data = JSON.parse(xhr.responseText);
                    parsePatients(response);
                  
                    $(".empty").hide();
                }
            },
            error: function (xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
    }
    //parse patients 
    function parsePatients(response) {
        $("#app_tbody").empty();
        var len = response.length;
        
        for (var i = 0; i < len; i++) {

            var patient_id = response[i].patient_id;
            var patient_user_id = response[i].p_user_id;
            var patient_first_name = response[i].p_first_name;
            var patient_middle_name = response[i].p_middle_name;
            var patient_last_name = response[i].p_last_name;
            var patient_age = response[i].p_age;
            var patient_description = response[i].description;
            var patient_phoneNumber = response[i].p_phone_number;

            var row = "<tr>";
            row += "<td id='doctor_" + patient_id + "' ><a class='profile_link' href='../patients/view_patient_profile.php?patient_id=" + patient_id + "'>" + patient_first_name.toUpperCase() + " " + patient_middle_name.toUpperCase() + " " + patient_last_name.toUpperCase() + "</a>  </td>";
            row += "<td>" + patient_phoneNumber +"</td>";
            row += "<td>" + patient_age +"</td>";
            row += "<td>" + patient_description +"</td>";


            row += "</tr>";
            $("#app_tbody").append(row);
            
        }
        
        
    }
    
    // show number entries
    function show_entries() {
        $("#show_entries").change(function () {
            AppointmentsToday();
            
            tableInfo();
            
        })
    }
   // search in table
    $("#insearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();

        $("#App_table tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

        });


    });

    


    // function sort

    function sort() {
        $(document).on('click', '#icon1', function () {
                $(".sort").css('opacity', '20%');
                columSort = "p_first_name DESC";
                AppendPatients(columSort);
                $("#icon1").css('visibility', 'hidden');
                $("#icon2").css('visibility', 'visible');
            
        });
       
     
    }
    sort1();
    function sort1() {
        $(document).on('click', '#icon2', function () {
                columSort = "p_first_name ASC";
                AppendPatients(columSort);
                $("#icon2").css('visibility', 'hidden');
                $("#icon1").css('visibility', 'visible');
            
        });
       
     
    }
  
    //table info
    tableInfo();
    function tableInfo() {
        var today_date = getDateToday();
        var op = 4;

            $.ajax({
                type: 'GET',
                url: "./ws/ws_admin_patients.php",
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

        for (var i = 0; i < len; i++) {

            var total_app = response[i].total_app;

            if (total_app <= 10) {
                tableLength = total_app;
            }
            else if (total_app > 10 && selectvalue == 10) {
                tableLength = 10;
            }
            else if (total_app > 25 && selectvalue == 25 ) {
                tableLength = 25;
            }
            else if (total_app < 25 && selectvalue == 25) {
                tableLength = total_app;
            }
            else if (total_app > 50 && selectvalue == 50) {
                tableLength = 50;
            }
            else if (total_app < 50 && selectvalue == 50) {
                tableLength = total_app;
            }
            else if (total_app > 100 && selectvalue == 100) {
                tableLength = 100;
            }
            else if (total_app < 100 && selectvalue == 100) {
                tableLength = total_app;
            }
            var text = "Showing 1 to " + tableLength + " of " + total_app + " entries";
        }
        $("#table_info").text(text);
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

