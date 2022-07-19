
$(document).ready(function () {
    display();
    getActions();
    function getActions() {
        var op = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_logins_register.php",
            dataType: 'json',
            data: { op: op},
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseActions(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });

    }

    function parseActions(response) {

        var len = response.length;

        for (var i = 0; i < len; i++) {

            var id = response[i].id;
            var email = response[i].user_email;
            var status = response[i].action_status;
            var date_time = response[i].date_time;
            var row = "<tr id='" + id + "'  >";
            row += "<td>" + statusMsg(status) + "</td>";
            row += "<td>" +  email+ "</td>";
            row += "<td>" + date_time + "</td>";
            row += "<td id='action'>" + "<button id='del_" + id + "' data-bs-toggle='modal' data-bs-target='#myModaldelete' class='delete btn'><i class='fas fa-trash'></i></button>";
            row += "</tr>";
            $("#actionstable").append(row);

        }
    }


    function statusMsg(status) {
        var msg = '';
        if (status == 1) {
            msg = "<div class='mt-2'><p id='msgsuccessa'>Admin logged in</p></div>";
        }
        else if  (status == 2) {
            msg = "<div class='mt-2'><p id='msgsuccess'>New Customer logged in</p></div>";
        }
        else if (status == 3) {
            msg = "<div class='mt-2'><p id='msgsuccess'>Old Customer logged in</p></div>";
        }
        else {
            msg = "<div class='mt-2'><p id='msgerror'>This email tried to login with incorrect password</p></div>";
        }
        return msg;
    }

    
    function display() {
        $("#select_filter").change(function () {
            var value = $("#select_filter").val();
            var selected = "";
            $("#actionstable").html('');
            if (value == "All") {
                getActions();
            }
            else if (value == "admin_log") {
                selected = "1";
                getdatafiltered(selected);
            }
            else if (value == "customer_log_N") {
                selected = "2";
                getdatafiltered(selected);
            }
            else if (value == "customer_log_O") {
                selected = "3";
                getdatafiltered(selected);
            }
            else if (value == "tried"){
                selected = "0";
                getdatafiltered(selected);
            }
            else {
                getActions();
            }

            

        });
    }
    function getdatafiltered(selected) {
        var op = 2;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_logins_register.php",
            dataType: 'json',
            data: { op: op, selected: selected },
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseActions(response);
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
        $("#actionstable").html('');
        return false;

    });

    //function delete all
    function deleteAll() {
        var op = 3;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_logins_register.php",
            data: { op: op},
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
            url: "./ws/ws_logins_register.php",
            data: { op: op,id:id},
            cache: false,
            success: function (response) {
                $('#' + id).hide();
            },

        });
    }

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

