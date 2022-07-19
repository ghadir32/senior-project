
$(document).ready(function () {
    invoice();


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

    function invoice() {

        var op = 6;
        pay_id = $("#pay_id").val();
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_payments.php",
            data: { op: op, pay_id:pay_id},

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
                    parseinvoice(response);
                   
                }
            },
            error: function (xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
    }
    //parse appointments today 
    function parseinvoice(response) {
        var len = response.length;
        var totalamount = 0;
        for (var i = 0; i < len; i++) {

            var pay_id = response[i].pay_id;
            var pay_app_id = response[i].pay_app_id;
            var doctor_full_name = response[i].doctor_full_name;
            var patients_full_name = response[i].patients_full_name;
            var pay_date = response[i].pay_date;
            var pay_time = response[i].pay_time;
            var patients_email = response[i].email;
            var app_date = response[i].app_date;
            var app_time = response[i].app_time;
            var pay_amount = response[i].pay_amount;
            var patients_age = response[i].p_age;
            var pay_method = response[i].pay_method;
            var patients_address = response[i].location;
            var patients_phone = response[i].p_phone_number;



            var row = "<tr  id='" + pay_id + "'  >";
            row += "<td>App" + pay_app_id + "</td>";
            row += "<td>"+ doctor_full_name + "</a>   </td>";
            row += "<td >" + app_date + "</td>";
            row += "<td  >" + app_time + "</td>";
            row += "<td >" + pay_amount + "$</td>";
            row += "<td class='pay_method'>" + pay_method + "</td>";
            $("#tbody_invoice").append(row);

            var todaydate = getDateToday();

            $("#name").append(patients_full_name);
            $("#age").append(patients_age);
            $("#address").append(patients_address);
            $("#phone").append(patients_phone);
            $("#email").append(patients_email);


            $("#pay_date_time").append(pay_date + " " + pay_time);
            
            $("#datetoday").append(todaydate);

            
            totalamount = + pay_amount + totalamount;
        }

        $("#total_price").append(totalamount+"$");
    }


    $(document).on('click', '#print', function () {
       
        window.print();

        window.location.href = "./admin_payments.php";
    });


});
