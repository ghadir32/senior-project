    $(document).ready(function(){

        getCustomers();
        ////get all customers function
        function getCustomers(){
            var op=5;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_Customers.php",
                dataType: 'json',
                data: {op: op},
                success: function (response) {
                    if (response == -1)
                        alert("Data couldn't be loaded!");
                    else {
                        parseCustomers(response);
                    }
                },
                error: function (xhr, status, errorThrown) {
                    alert(status + errorThrown);
                }
            });
        }
        
        function parseCustomers(response) {
            
            var len = response.length;
            for(var i=0; i<len; i++){
                var id = response[i].id;
                var username = response[i].username;
                var email = response[i].email;
                var address = response[i].address;
                var phone_number = response[i].phone_number;
                var status = response[i].status;
                var row = "<tr id='" +id +"'  >";
                row += "<td>" + username + "</td>";
                row += "<td>" + email + "</td>";
                row += "<td>" + phone_number + "</td>";
                row += "<td>" + address + "</td>";
                if(status == 0){
                    row += "<td>" + "<i title='Deactivated' class='fas fa-thumbs-down'></i>" + "</td>";
                 }else{
                    row += "<td>" + "<i title='Activated'  class='fas fa-thumbs-up'></i>" + "</td>";
                }
                 row += "<td>" +  "<button title='Activate User' class='actionbtn edit btn' id='edit_"+id+"' ><i class='fas  fa-user-check'></i></button>"+" <button title='Delete/Deactivate' data-bs-toggle='modal' data-bs-target='#myModaldelete' id='del_" + id + "'  class='btn del'><i  class=' fas fa-trash'></i></button> </td>";
                row += "</tr>";
                $("#customerstbody").append(row);
             } 
        }

    });


    ////delete or deactivate  user function
    $(document).ready(function(){
        $(document).on('click', '.del', function(){
            var id =  $(this).attr("id");
            id = id.substring(4);
            $('#delIn').val(id);
 
        });

        $(document).on('click', '.delC', function(){
      
           let inputVal = document.getElementById("delIn").value;
            deleteCustomer(inputVal);
            $(this).parents("tr").remove();
 
        });

        function  deleteCustomer(id){
            var op = 3;
            $.ajax({
                type:'GET',
                url:  "./ws/ws_Customers.php",
                data: { op:op, id:id},
                cache: false,
            });
        }

        $(document).on('click', '.deactC', function(){
      
            let inputVal = document.getElementById("delIn").value;
             deactivateUser(inputVal);
  
         });

         function deactivateUser(id){
            var op = 6;  
            $.ajax({
                type: 'GET',
                url:  "./ws/ws_Customers.php",
                data: { op: op,id: id },
                cache: false,
                success: function (response) {
                   
                    //addrow(book_name, writer_name, isbn, price, quantity);
                },
            });
        }
        // $('#insearch').on("keyup", function(){
        //     var val = $(this).val().toLowerCase();
        //     $("#customerstable tbody tr").filter(function(){
        //         $(this).toggle($(this).toLowerCase.indexOf(val) > -1)
        //     });
        // });
    
    });

    //close modal empty values
    $(document).ready(function(){
        $(document).on('click', '#xmodal', function(){
            $('#username').val('');
            $('#uemail').val('');
            $('#password').val('');
            $('#address').val('');
            $(".hideP").hide();
         });

    });

      ////activate user function
      $(document).ready(function(){
        $(document).on('click', '.edit', function(){
            var id =  $(this).attr("id");
            id = id.substring(5);
           // alert(id);
            activateUser(id);
        });

        function activateUser(id){
            var op = 7;  
            $.ajax({
                type: 'GET',
                url:  "./ws/ws_Customers.php",
                data: { op: op, id: id },
                cache: false,
                success: function (response) {
                    //addrow(book_name, writer_name, isbn, price, quantity);
                },
            });
            location.reload();
        }
    
    
    });

  //////add user function
  $(document).ready(function(){
   $(document).on('click', '#submit', function(){
     var username = $('#username').val();
     var email = $('#uemail').val();
     var passwd = $('#password').val();
     var address = $('#address').val();
    var gender = $('#gender').val();
    var status = $('#status').val();

    //alert(username);
     if (username.length == 0) {
        $('#Pname').show();
          return false;
    }else{ 
        $('#Pname').hide();
    }
    
    if(email.length == 0){
        $("#Pemail").show();
        return false;
    }else{ 
        $('#Pemail').hide();
    }
    if(passwd.length == 0){
         $('#Ppassword').show();
        return false;
    }else{ 
        $('#Ppassword').hide();
    }
    if(address.length == 0){
        $('#Paddress').show();
        return false;
    }else{ 
        $('#Paddress').hide();
    }
    if(gender.length == 0){
        
        $('#Pgender').show();
       // $('#Pgender').focus();
        return false;
    }else{ 
        $('#Pgender').hide();
    }
     

    addCustomer(username, email, passwd, address, gender, status);
        $('#username').val('');
        $('#uemail').val('');
        $('#password').val('');
        $('#address').val('');
        $('#gender').val('');
        $('#status').val('');


   });

   function addCustomer(username, email, password, address,  gender, status){
  
    var op = 1;  
    $.ajax({
        type: 'GET',
        url:  "./ws/ws_Customers.php",
        data: { op: op, username: username, email: email, password: password, address: address, gender: gender, status: status },
        cache: false,
        success: function (response) {
            //addrow(book_name, writer_name, isbn, price, quantity);
        },
    });
   
   }

  });

////search user by name from db(not used)
//    function  searchUser(searchin){
//      var uname = searchin.toLowerCase();
//      var op = 2;  
//      $.ajax({
//          type: 'GET',
//          url:  "./ws/ws_Customers.php",
//          data: { op: op,  uname: uname },
//          cache: false,
//          success: function (response) {
//             if (response == -1)
//                 alert("Data couldn't be loaded!");
//             else {
//                 parseUsers(response, uname);
//             }
//         },
//         error: function (xhr, status, errorThrown) {
//             alert(status + errorThrown);
//         }
//      });
//     }

//     function parseUsers(response){

//         var len = response.length;
//         $("#customerstbody").empty();

//         for(var i=0; i<len; i++){

//             var id = response[i].id;
//             var username = response[i].username;
//             var email = response[i].email;
//             var address = response[i].address;
//             var gender = response[i].gender;
//             var status = response[i].status;
//             var row = "<tr id='" +id +"'  >";
//             row += "<td>" + username + "</td>";
//             row += "<td>" + email + "</td>";
//             row += "<td>" + gender + "</td>";
//             row += "<td>" + address + "</td>";
//             row += "<td>" + status + "</td>";
//             row += "<td>" +  "<button class='actionbtn btn' id='edit_"+id+"'  data-bs-toggle='modal' data-bs-target='#myModal'><i class='fas  fa-edit'></i></button>"+" <button id='del_" + id + "'  class='btn del'><i class='fas fa-trash'></i></button> </td>";
//             row += "</tr>";
//             $("#customerstbody").append(row);

//         } 
//     }



//filter according to selected option(female, male, kids)  
  $(document).ready(function(){
    $("select.filter").change(function(){
        var selectedFilter = $(this).children("option:selected").val();
        getUserByGender(selectedFilter);
   
    });

    function getUserByGender(gender){
        var op=4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_Customers.php",
            dataType: 'json',
            data: {op: op, gender: gender},
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseCustomers(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });

    }

    function parseCustomers(response){

                var len = response.length;
                $("#customerstbody").empty();
        
                for(var i=0; i<len; i++){
        
                    var id = response[i].id;
                    var username = response[i].username;
                    var email = response[i].email;
                    var address = response[i].address;
                    var gender = response[i].gender;
                    var status = response[i].status;
                    var row = "<tr id='" +id +"'  >";
                    row += "<td>" + username + "</td>";
                    row += "<td>" + email + "</td>";
                    row += "<td>" + gender + "</td>";
                    row += "<td>" + address + "</td>";
                    row += "<td>" + status + "</td>";
                    row += "<td>" +  "<button class='actionbtn btn' id='edit_"+id+"'  data-bs-toggle='modal' data-bs-target='#myModal'><i class='fas  fa-edit'></i></button>"+" <button id='del_" + id + "'  class='btn del'><i class='fas fa-trash'></i></button> </td>";
                    row += "</tr>";
                    $("#customerstbody").append(row);
        
                } 
            }

          
            
            
});

////function to search through all table cells (td)
    $(document).ready(function(){

    $("#insearch").on("keyup", function(){

            var value = $(this).val().toLowerCase();
            $("#customerstable tbody tr").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

         });
       });
    });
    



        
     











