$(document).ready(function(){

    var DOC_ID;
    DOC_ID = document.getElementsByClassName("userHiddenId")[0].value; 
    var pass;


    var usernamespan =  document.getElementById("Dr_username");
    var emailspan =  document.getElementById("Dr_email");
    var phonespan =  document.getElementById("Dr_phone");
    var passspan =  document.getElementById("Dr_password");
    var usernameInput =  document.getElementById("newusername");
    var emailInput =  document.getElementById("newemail");
    var phoneInput =  document.getElementById("newphone");
    var oldpass =  document.getElementById("oldpass");
    var newpass =  document.getElementById("newpass");
    var confirmNewPass =  document.getElementById("confirmNewPass");

    var emailwarning =  document.getElementById("emailWarning");
    var usernamewarning =  document.getElementById("usernameWarning");
    var phonewarning =  document.getElementById("phoneWarning");
    var usernamewarning2 =  document.getElementById("usernameWarning2");
    var emailvalidate = document.getElementById("emailvalidate");
    var phonevalidate = document.getElementById("phonevalidate");


 getSettings();
 function getSettings(){
    var op = 1;

    $.ajax({
        type: 'GET',
        url: "./ws/ws_settings.php",
        dataType: 'json',
        data: { op: op, id: DOC_ID},
        
        success: function (response) {
            if (response == -1)
              alert("Data couldn't be loaded!");    
              else {
               parseSettings(response);
            }
        },
        error: function (xhr, status, errorThrown) {
            alert(status + errorThrown);
        }
    });
 }


 function parseSettings(response){
    var username = response[0].username;
    var email = response[0].email;
    var phone = response[0].Phone_number;
    var password = response[0].password;

    usernamespan.innerHTML = username;
    emailspan.innerHTML = email;
    phonespan.innerHTML = phone;
    //passspan.innerHTML = password;

    usernameInput.value = username;
    emailInput.value = email;
    phoneInput.value = phone;
   // passInput.value = password;
   pass = password;

}


    $('.editt').click(function(e){
        var clickedClass = e.target.className;
        var clicked_icon = $(e.target).attr('id');

        var passInput2 =  document.getElementById("editUsername");

       switch(clicked_icon){
          case 'editUsername':
            document.getElementById("editUsername").style.display = "none";
            usernamespan.style.display="none";
            usernameInput.style.display="block";
            usernamewarning.style.display = "block";

            break;

         case 'editEmail':
           document.getElementById("editEmail").style.display = "none";
            emailspan.style.display="none";
            emailInput.style.display="block";
            emailwarning.style.display = "block";

             break; 

          case 'editPhone':
           document.getElementById("editPhone").style.display = "none";
            phonespan.style.display="none";
            phoneInput.style.display="block";
            phonewarning.style.display = "block";

             break;

          case 'editPass':
            document.getElementById("editPass").style.display = "none";
            newpass.style.display="block";
            confirmNewPass.style.display="block";
            oldpass.style.display="block";

            
             break;

       }
        
    });

    $('#save').click(function(){
        if ($("#newusername").val() == "") {
            usernamewarning2.style.display = "block";
            return false;

        }
        else if( usernameInput.value != usernamespan.innerHTML && usernameInput.value != ''){
            updatesetting("username", usernameInput.value );
        } 
        if ($("#newemail").val() == "") {
            emailvalidate.style.display = "block";
            return false;

        }
        else  if( emailInput.value != emailspan.innerHTML){
            updatesetting("email", emailInput.value );
        }
        if (phoneInput.value == "") {
            phonevalidate.style.display = "block";
            return false;

        }
       else if( phoneInput.value != phonespan.innerHTML){
            updatesetting("phone_number", phoneInput.value );
        }


        if( newpass.style.display == "block"){
            if( newpass.value == '' || confirmNewPass.value == ''){
                var newpassAlert = document.getElementById("emptyPassAlert");
               newpassAlert.style.display = "block";
                   //alert("passwords empty");
            }
        }
       

        if(  oldpass.style.display == "block" && pass != oldpass.value){
            var oldalert= document.getElementById("oldPassAlert");
            oldalert.style.display = "block";


            //$("#oldPassAlert").style.display = "block";

            //alert("old pass wrong");
        }


        
            if(  newpass.value != '' || confirmNewPass.value != ''){
                if (newpass.value == confirmNewPass.value) {
                    
                    $.ajax({
                        type: 'GET',
                        url: "./ws/ws_settings.php",
                        dataType: 'json',
                        data: { op: 2, id: DOC_ID, oldpass: oldpass.value, newpass: newpass.value },
                        
                        success: function (response) {
                           
                            if (response == 0) {
                                //done
                            }
                            else {
                                // not
                            }
                        },
                        error: function (xhr, status, errorThrown) {
                            alert(status + errorThrown);
                        }
                    });
                }else{
                    var newpassAlert= document.getElementById("newPassAlert");
                    newpassAlert.style.display = "block";
                  }

            }
            
        

         
        jQuery('.inputs').hide();
        jQuery('.alert').hide();
       getSettings();
        usernamespan.style.display= "inline-block";
        emailspan.style.display= "inline-block";
        phonespan.style.display= "inline-block";
        document.getElementById("editUsername").style.display = "inline-block";
        document.getElementById("editEmail").style.display = "inline-block";
        document.getElementById("editPhone").style.display = "inline-block";
        document.getElementById("editPass").style.display = "inline-block";

    });

    

    function updatesetting(dataType, dataValue){
        //alert(dataType + dataValue);
        var op = 3;
                $.ajax({
                    type: 'GET',
                    url: "./ws/ws_settings.php",
                    dataType: 'json',
                    data: { op: op, id:DOC_ID, datatype:dataType, datavalue: dataValue },
                    
                    success: function (response) {
                        if (response == -1)
                          alert("Data couldn't be loaded!");    
                          else {
                            getSettings();
                        }
                    },
                    error: function (xhr, status, errorThrown) {
                        alert(status + errorThrown);
                    }
                });
    }




    $('#deleteAcc').click(function(){
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_settings.php",
            dataType: 'json',
            data: { op: op, id:DOC_ID },
            
            success: function (response) {
                if (response == -1)
                  alert("Data couldn't be loaded!");    
                  else {
                  // parseSettings(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    });



});