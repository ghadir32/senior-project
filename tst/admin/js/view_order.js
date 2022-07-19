
$(document).ready(function () {
    getorder();
    function getorder() {
        var op = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_order.php",
            dataType: 'json',
            data: { op: op },
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseordere(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });

    }

    function parseordere(response) {

        var len = response.length;

        for (var i = 0; i < len; i++) {

            var id = response[i].id;
            var customer_id = response[i].customer_id;
            var product_name = response[i].product_name;
            var product_category = response[i].product_category;
            var product_gender = response[i].product_gender;
            var product_quantity = response[i].product_quantity;
            var product_final_price = response[i].product_final_price;
            var product_image = response[i].product_image;
            var date_time = response[i].date_time;
            var status = response[i].status;
            var totalprice = product_quantity * product_final_price;
            var item = "<tr id='" + id + "'>";

            item += "<td data-target='product_image'>" + " <img  src='../product_image/" + product_image + "' />" + "</td>";
            item += "<td data-target='product_name'>" + product_name + "</td>";
            item += "<td data-target='product_category'>" + product_category + "</td>";
            item += "<td data-target='product_gender'>" + product_gender + "</td>";
            item += "<td data-target='product_quantity' id='quantity'>" + product_quantity + "</td>";
            item += "<td data-target='product_final_price' id='totalp'>" + totalprice+ "$</td>";
            item += "</tr>";
            $("#orderestable").append(item);
            statu(status);
            getTotal();
            $("#order_date").text("Order Date: " + date_time);
            updateStock(id, product_quantity);
        }
        
        

    }

    function statu(st) {
        if (st == 1 || st == 2) {
            $("#accept").hide();
            $("#reject").hide();
        }
        else {
            $("#accept").show();
            $("#reject").show();
        }
    }
    getcustomerinfo();
    function getcustomerinfo() {
        var op = 2;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_order.php",
            dataType: 'json',
            data: { op: op },
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parsecustomer(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });

    }

    function parsecustomer(response) {

        var len = response.length;

        for (var i = 0; i < len; i++) {

            var id = response[i].id;
            var username = response[i].username;
            var email = response[i].email;
            var phone_number = response[i].phone_number;
            var address = response[i].address;
            
        }
        $("#i_username").text("Username: " + username);
        $("#i_email").append("Email: <a href='mailto:" + email + "' name='emaillink'>" + email + "</a>");
        $("#i_Phone").text("Phone Number: 00961" + phone_number);
        $("#i_address").text("Address: " + address);
    }
    ///button accept order
    $(document).on('click', '#accept', function () {
        var op = 3;
        var status = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_order.php",
            dataType: 'json',
            data: { op: op, status: status},
            success: function (response) {
            },

        });
        window.location.href = "ordered.php";

    });
    
    ///button reject order
    $(document).on('click', '#reject', function () {
        var op = 3;
        var status = 2;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_order.php",
            dataType: 'json',
            data: { op: op, status: status },
            success: function (response) {
            },

        });
        window.location.href = "ordered.php";
    });
    
    function getTotal () {

        var finaltotalprice = 0;

        $("tr #totalp").each(function (index, value) {
            currentRow = parseFloat($(this).text());
            finaltotalprice += currentRow;
        });

        $("#total").text("Total Price: " + finaltotalprice + "$");
    }


    function updateStock(product_id, product_quantity) {

        $(document).on('click', '#accept', function () {
            subtractquantity(product_id, product_quantity);
        });



    }








    function getquantity() {
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_order.php",
            dataType: 'json',
            data: { op: op},
            success: function (response) {
                var len = response.length;

                for (var i = 0; i < len; i++) {

                    var product_id = response[i].product_id;
                    var product_quantity = response[i].product_quantity;
                    subtractquantity(product_id, product_quantity);
                }
            },

        });
    }

    function subtractquantity(product_id,product_quantity) {
        var op = 5;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_view_order.php",
            dataType: 'json',
            data: { op: op, product_id: product_id, product_quantity: product_quantity},
            success: function (response) {
            },

        });
    }

});

