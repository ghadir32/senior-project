
$(document).ready(function () {
    display();
    getorderes();
    function getorderes() {
        var op = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_ordered.php",
            dataType: 'json',
            data: { op: op },
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseorderes(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });

    } 

    function parseorderes(response) {

        var len = response.length;

        for (var i = 0; i < len; i++) {

            var id = response[i].id;
            var username = response[i].username;
            var custome_id = response[i].customer_id;
            var email = response[i].email;
            var phone_number = response[i].phone_number;
            var address = response[i].address;
            var status = response[i].status;
            var date_time = response[i].date_time;
            var row = "<tr id='" + id + "'  >";
            row += "<td id='" + custome_id + "'>" + username + "</td>";
            row += "<td>" +  phone_number+ "</td>";
            row += "<td>" + email + "</td>";
            row += "<td>" + address + "</td>";
            row += "<td>" + date_time + "</td>";
            row += "<td id='status'>" + getstautus(status) + "</td>";
            row += "<td>" + "<button id='view_" + id + "' class='view btn btn-" + btnviewcolor(status) + "'> View Order products</button>";
               
            row += "</tr>";
            
            $("#orderestable").append(row);

        }
    }
    function btnviewcolor(status) {
        if (status == 1) {
            return "success";
        }
        else if (status == 2) {
            return "danger";
        }
        else {
            return "warning";
        }

    }

    function getstautus(status) {
        if (status == 0) {
            
            var statusicon = "<i class='fas fa-clock'></i>";
            return statusicon;
        }
        else if (status == 2) {

            var statusicon = "<i class='fas fa-ban'></i>";
            return statusicon;
        }
        else {
            var buttoncolor = "<i class='fas fa-shipping-fast'></i>";
            return buttoncolor;
        }
    }

    
    function display() {
        $("#select_filter").change(function () {
            var value = $("#select_filter").val();
            var selected = " ";
            $("#orderestable").html('');
            if (value == "All") {
                getorderes();
            }
            else if (value == "Unaccepted") {
                selected = "2";
                getdatafiltered(selected)

            }
            else if (value == "Waitings") {
                selected = "0";
                getdatafiltered(selected)

            }
            else if (value == "Accepted") {
                selected = "1";
                getdatafiltered(selected)
            }
            else {
                getorderes();
            }

            

        });
    }

    function getdatafiltered(selected) {
        var op = 2;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_ordered.php",
            dataType: 'json',
            data: { op: op, selected: selected },
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseorderes(response);
                }
            },
        });
    }

    $(document).on('click', '#modaldel', function () {
        $("#delete_all").show();
        $("#delete_this").hide();
    });
    ///button delete all
    $(document).on('click', '#delete_all', function () {



        deleteAll();
        $("#myModaldelete").modal('toggle');
        $("#orderestable").html('');
        return false;

    });

    //function delete all
    function deleteAll() {
        var op = 3;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_ordered.php",
            data: { op: op },
            cache: false,
            success: function (response) {
            },

        });
    }
    ///button delete all
    $(document).on('click', '.delete', function () {

        $("#delete_all").hide();
        $("#delete_this").show();
        var id = $(this).attr("id");

        id = id.substring(4);
        $('#idd').val(id);

    });
    $(document).on('click', '#delete_this', function () {
        var id = $('#idd').val();
        deleteThis(id);
        $("#myModaldelete").modal('toggle');

        return false;

    });
    //delete this
    function deleteThis(id) {
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_ordered.php",
            data: { op: op, id: id },
            cache: false,
            success: function (response) {
                $('#' + id).hide();
            },

        });
    }

    //send order products to view order ws
    function orderproducts(order_id) {
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_ordered.php",
            dataType: 'json',
            data: { op: op, order_id: order_id},
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                }
            },
        });
    }
    //send order products to view order ws
    function customerinfo(customer_id) {
        var op = 5;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_ordered.php",
            dataType: 'json',
            data: { op: op, customer_id: customer_id },
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                }
            },
        });
    }
    ///button view order
    $(document).on('click', '.view', function () {

        var order_id = $(this).attr("id");

        order_id = order_id.substring(5);
        orderproducts(order_id);
        var customer_id = $(this).closest("tr").children('td:first').attr("id");

        customerinfo(customer_id);
        window.location.href = "view_order.php";


    });
    // search in table
    $(document).ready(function () {
        $("#insearch").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

});

