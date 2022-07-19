


$(document).ready(function () {


    //button submit form validation//////////////
    $(document).on('click', '#submit_product', function () {

        var product_name = $('#product_name').val();
        var product_category = $('#product_category').val();
        var product_gender = $('#product_gender').val();
        var product_quantity = $('#product_quantity').val();
        var product_price = $('#product_price').val();
        var product_discount = $('#product_discount').val();
        var product_image = $('#product_image').val();

        if (product_name.length == 0) {
            $('#p0').show();
            $('#p0').text('* Please enter product name');
            return false;
        }
        else if (product_name.length > 0) {
            $('#p0').hide();
        }
        if (product_category == '') {
            $('#p1').show();
            $('#p1').text('* Please select product category');
            return false;
        }
        else if (product_category != '0') {
            $('#p1').hide();
        }
        if (product_gender == '') {
            $('#p2').show();
            $('#p2').text('* Please select product gender');
            return false;
        }
        else if (product_gender != '') {
            $('#p2').hide();
        }
        if (product_quantity.length == 0) {
            $('#p3').show();
            $('#p3').text('* Please enter product quantity');
            return false;
        }
        else if (product_quantity.length > 0) {
            $('#p3').hide();
        }
        if (product_price.length == 0) {
            $('#p4').show();
            $('#p4').text('* Please enter product price');
            return false;
        }
        else if (product_price.length > 0) {
            $('#p4').hide();
        }
        if (product_discount.length == 0) {
            $('#product_discount').val('0');
        }

        if (product_image.length == 0) {
            $('#p5').show();
            $('#p5').text('* Please choose image for your product');
            return false;
        }
        else if (product_image.length > 0) {
            $('#p5').hide();

        }
        var product_final_price = calculateFinalPrice(product_price, product_discount);
        product_image = product_image.substring(12);
        $('#imageproductname').val(product_image);
        addproduct(product_name, product_category, product_gender, product_quantity, product_price, product_final_price, product_image);
        //getproducts();

        //location.reload();
        $("#myModal").modal('toggle');


        return false;
        
    });


    //add product to ws//////////////////
    function addproduct(product_name, product_category, product_gender, product_quantity, product_price, product_final_price, product_image) {
        var op = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_products.php",
            data: { op: op, product_name: product_name, product_category: product_category, product_gender: product_gender, product_quantity: product_quantity, product_price: product_price, product_final_price: product_final_price, product_image: product_image },
            cache: false,
            success: function (response) {
                $("#productstbody").empty();
                getproducts();

            },
        });
    }


    //final price for product after discount rate//////////////
    function calculateFinalPrice(based_price, discount) {
        var final_price = based_price - (discount * based_price / 100);
        return final_price;
    }

    //function get value from ws////////////////
    function getproducts() {
        var op = 5;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_products.php",
            dataType: 'json',
            data: { op: op},
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseproducts(response);
                }
            },
        });
    }



    //get values and put it in product table////////////////
    function parseproducts(response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
            var id = response[i].id;
            var product_image = response[i].product_image;
            var product_name = response[i].product_name;
            var product_category = response[i].product_category;
            var product_gender = response[i].product_gender;
            var product_price = response[i].product_price;
            var product_final_price = response[i].product_final_price;
            var product_quantity = response[i].product_quantity;
            var product_status = response[i].status;

            var item = "<tr id='" + id + "'>";

            item += "<td data-target='product_image'>" + " <img id='image" + id + "' src='../product_image/" + product_image + "' />" + "</td>";



            item += "<td data-target='product_name'>" + product_name + "</td>";
            item += "<td data-target='product_category'>" + product_category + "</td>";
            item += "<td data-target='product_gender'>" + product_gender + "</td>";
            item += "<td data-target='product_quantity' id='quantity'>" + product_quantity + "</td>";
            item += "<td data-target='product_price'>" + product_price + "$</td>";
            item += "<td data-target='product_final_price'>" + product_final_price + "$</td>";
            item += "<td data-target='product_status'>" + getstautus(product_quantity, product_status); "</td>"
            item += "<td id='action'><button class='edit btn' id='edit_" + id
                + "'  data-bs-toggle='modal' role='none' data-bs-target='#myModal'><i class='fas fa-edit'></i></button>"
                + "<button id='del_" + id + "' data-bs-toggle='modal' data-bs-target='#myModaldelete' class='delete btn'><i class='fas fa-trash'></i></button>"
                + "<button' id = 'act_" + id + "' class='activate btn'> <i class='far fa-check-circle'></i></button></td>";
            item += "</tr>";

            $("#productstbody").append(item);
        }
    }



    //button edit/////////////////////////////////////
    $(document).on('click', '.edit', function () {
        var id = $(this).attr("id");

        id = id.substring(5);
        editproduct(id);
        $('#Update_product').show();
        $('#cancel_p').show();
        $('#submit_product').hide();
        $(".modal-title").text("Update Product");
    });
    $(document).on('click', '#add_modal', function () {
        $(".modal-title").text("Add New Product");
    });

    //function edit data from ws/////////////////
    function editproduct(id) {
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_products.php",
            dataType: 'json',
            data: { op: op, id: id },
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseEdit(response);
                }
            },
            error: function (xhr, status, errorThrown) {

                alert(status + errorThrown);
            }

        });
    }



    //function to get value from ws and put it in modal////////////////////
    function parseEdit(response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
            var id = response[i].id;
            // var product_image = response[i].product_image;
            var product_name = response[i].product_name;
            var product_category = response[i].product_category;
            var product_gender = response[i].product_gender;
            var product_price = response[i].product_price;
            var product_final_price = response[i].product_final_price;
            var product_quantity = response[i].product_quantity;
            var product_image = response[i].product_image;
            var product_status = response[i].status;
            //calculate discount rate
            var discount = calculateDiscountRate(product_price, product_final_price);
            $('#id').val(id);
            $('#status').val(product_status);
            $('#product_name').val(product_name);
            $('#product_category').val(product_category);
            $('#product_gender').val(product_gender);
            $('#product_quantity').val(product_quantity);
            $('#product_price').val(product_price);
            $('#product_discount').val(discount);
            $('#product_image').hide();
            $('#edit_image').show();
            $('#imageproductname').val(product_image);
        }
    }



    //button update//////////////////////////////////
    $(document).on('click', '#Update_product', function () {

        var id = $('#id').val();
        var product_name = $('#product_name').val();
        var product_category = $('#product_category').val();
        var product_gender = $('#product_gender').val();
        var product_quantity = $('#product_quantity').val();
        var product_price = $('#product_price').val();
        var product_discount = $('#product_discount').val();
        var product_image_file = $('#product_image').val();


        if (product_name.length == 0) {
            $('#p0').show();
            $('#p0').text('* Please enter product name');
            return false;
        }
        else if (product_name.length > 0) {
            $('#p0').hide();
        }
        if (product_category == '') {
            $('#p1').show();
            $('#p1').text('* Please select product category');
            return false;
        }
        else if (product_category != '0') {
            $('#p1').hide();
        }
        if (product_gender == '') {
            $('#p2').show();
            $('#p2').text('* Please select product gender');
            return false;
        }
        else if (product_gender != '') {
            $('#p2').hide();
        }
        if (product_quantity.length == 0) {
            $('#p3').show();
            $('#p3').text('* Please enter product quantity');
            return false;
        }
        else if (product_quantity.length > 0) {
            $('#p3').hide();
        }
        if (product_price.length == 0) {
            $('#p4').show();
            $('#p4').text('* Please enter product price');
            return false;
        }
        else if (product_price.length > 0) {
            $('#p4').hide();
        }
        if (product_discount.length == 0) {
            $('#product_discount').val('0');
        }
        if (product_discount > 100) {
            $('#p6').show();
            $('#p6').text('* Maximum value of dicount is 100');
            return false;
        }
        if (product_image_file.length > 0) {
            product_image_file = product_image_file.substring(12);
            var product_image = $('#imageproductname').val(product_image_file);
        }
     
        var product_final_price = calculateFinalPrice(product_price, product_discount);

        var product_image = $('#imageproductname').val();

        updateproduct(id, product_name, product_category, product_gender, product_quantity, product_price, product_final_price, product_image);
        $("#myModal").modal('toggle');
        
        return false;
        
    });


    //function to update products in ws///////////////////
    function status(quantity) {
        var stat = $("#status").val();
        if (quantity == 0 || stat == 0) {
            return 0;
        } else {
            return 1;
        }
    }


    function updateproduct(id, product_name, product_category, product_gender, product_quantity, product_price, product_final_price, product_image) {
        var op = 2;
        var st = status(product_quantity);
        $.ajax({
            type: 'GET',
            url: "./ws/ws_products.php",
            data: { op: op, status: st, id: id, product_name: product_name, product_category: product_category, product_gender: product_gender, product_quantity: product_quantity, product_price: product_price, product_final_price: product_final_price, product_image: product_image },
            cache: false,
            success: function (response) {


                $('#image' + id).attr("src", "../product_image/" + product_image);

                $('#image' + id).attr("src", "../product_image/" + product_image);

                $('#' + id).children('td[data-target=product_name]').text(product_name);
                $('#' + id).children('td[data-target=product_category]').text(product_category);
                $('#' + id).children('td[data-target=product_gender]').text(product_gender);
                $('#' + id).children('td[data-target=product_quantity]').text(product_quantity);
                $('#' + id).children('td[data-target=product_price]').text(product_price + '$');
                $('#' + id).children('td[data-target=product_final_price]').text(product_final_price + '$');
                $('#' + id).children('td[data-target=product_status]').html(getstautus(product_quantity, st));
            },
        });

    }

    //function to calculate discount rate/////////
    function calculateDiscountRate(based_price, finalprice) {
        var discount = 100 - (finalprice * 100 / based_price);
        return discount;
    }



    $(document).on('click', '#add_modal', function () {
    $('#dit_image').hide();
    $('#product_image').show();
    });
    
    
    //when hide modal//////////////////////
    $("#myModal").on('hidden.bs.modal', function () {
        $('#p0').hide();
        $('#p1').hide();
        $('#p2').hide();
        $('#p3').hide();
        $('#p4').hide();
        $('#p5').hide();
        $('#p6').hide();
        $(this).find("form").trigger('reset');
        $('#Update_product').hide();
        $('#cancel_p').hide();
        $('#submit_product').show();
        $('#edit_image').hide();
    });
    $("#myModal").on('submit', function () {
        return false;
    });
    
    // search in table
    $(document).ready(function () {
        $("#insearch").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#productstable tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });


    //cancel button
    $(document).on('click', '#cancel_p', function () {


        $("#myModal").modal('toggle');
        return false;

    });

    //ask to edit the image//////////////
    $(document).on('click', '#edit_image', function () {
        if ($("#Update_product").show()) {
            $('#product_image').show();
            $('#edit_image').hide();
        }
        $("#submit_product").hide();

        
    });
    //
    $("#add_rows").val(5);



    //function to get the status of products
    function getstautus(quantity,status) {
        if (quantity == 0 || status == 0) {
            return "<i class='fas fa-thumbs-down'></i>"
        }
        else {
            return "<i class='fas fa-thumbs-up'></i>"
        }
    }
    function setstautus(status) {
        if (status == 0) {
            return "<i class='fas fa-thumbs-down'></i>"
        }
        else {
            return "<i class='fas fa-thumbs-up'></i>"
        }
    }

    //button delete
    $(document).on('click', '.delete', function () {

        var id = $(this).attr("id");

        id = id.substring(4);
        $('#idd').val(id);

    });

    //button active product
    $(document).on('click', '.activate', function () {
        var id = $(this).attr("id");
        id = id.substring(4);
        var status = 1;
        update_deactivate(id, status);
       
    });
    ///button deactivate
    $(document).on('click', '#deactivate_product', function () {
        var id = $('#idd').val();
        var status = 0;
        update_deactivate(id, status);
        $("#myModaldelete").modal('toggle');

        return false;
    });

    ///button delete product
    $(document).on('click', '#delete_product', function () {
        var id = $('#idd').val();
        deleteproduct(id);
        $("#myModaldelete").modal('toggle');

        return false;

    });

    //function delete product
    function deleteproduct(id) {
        var op = 3;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_products.php",
            data: { op: op, id: id },
            cache: false,
            success: function (response) {
                $('#' + id).hide();
            },

        });
    }

    //function deactivate status
    function update_deactivate(id,st) {
        var op = 6;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_products.php",
            data: { op: op, status: st, id: id },
            cache: false,
            success: function (response) {
                $('#' + id).children('td[data-target=product_status]').html(setstautus(st));
            },
        });
    }
    $("#myModaldelete").on('hidden.bs.modal', function () {
        $(this).find("form").trigger('reset');
    });
    $("#myModaldelete").on('submit', function () {
        return false;
    });

    //filter table by usng slect options
    function display() {
        $("#select_filter").change(function () {
            var value = $("#select_filter").val();
            var selected = " ";
            if (value == "name") {
                getproducts();
            }
            else if (value == "male" || value == "female" || value == "kids") {
                selected = "product_gender";

            }
            else if (value == "activated") {
                value = "1";
                selected = "status";

            }
            else if (value == "deactivated") {
                value = "0";
                selected = "status";

            }
            else {
                selected = "product_category";
            }
            var op = 7;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_products.php",
                dataType: 'json',
                data: { op: op, value: value, selected: selected },
                success: function (response) {
                    if (response == -1)
                        alert("Data couldn't be loaded!");
                    else {
                        parseproducts(response);
                    }
                },
            });
            $("#productstbody").html('');

        })
    }


    //function get categories from ws
    function getcategories() {
        var op = 8;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_products.php",
            dataType: 'json',
            data: {op:op},
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parsecategories(response);

                }
            },

        });
    }

    //function put categories in slections 
    function parsecategories(response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
            var categories_name = response[i].cat_name;
            var item = "<option value='" + categories_name + "'>" + categories_name + "</option>";

            $("#select_filter").append(item);
            $("#product_category").append(item);

        }
    }
    //call function get data/////////////
    display();
    getproducts();
    getcategories();
});