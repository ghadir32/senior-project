$(document).ready(function(){
    
    // check if user is logged in
  var val = document.getElementsByClassName("userHiddenId")[0].value; 
  var user_img = document.getElementsByClassName("userImg")[0]; 
  var user_name = document.getElementById("usrName");

  $("#NavBookApp").click(function() {
    bookAppointment();

});

$(document).on('click', '#logout', function () {

    var op = 3;
    $.ajax({
        type: 'GET',
        url: "login_register/ws/users_ws.php",
        dataType: 'json',
        data: { op: op},
        success: function (response) {
            window.location.href = "login_register/login.php";
        },
    });

});



function bookAppointment(){

    //check if logged in, if yes check if they have row in patients table 
 if ( val.length < 10 ) {   

    
    //check if the user data is filled, if yes redirect to book app page or fill the form
    var op = 3;
    $.ajax({
        type: 'GET',
        // url: "../center/ws/ws_index.php",
        url:"center/ws/ws_index.php",
        dataType: 'json',//////////patient id
        data: { op: op, PId: val },
        
        success: function (response) {
            if (response == null)
            //no patient row in patients table-> redirect to fill data page
            window.location.href = "center/Patient_formFilling.php";
            else {
                // alert("fi data");
                //data is available -> rediredt to BOOK app page
                window.location.href = "center/patient_make_appointment.php";
                
            }
        },
        //no row is found, patient data isnt complete
        error: function (xhr, status, errorThrown) {
            alert(status + errorThrown +"redirect to data page");
            // window.location.href = "http://localhost/test_senior_project/center/Patient_formFilling.php";

        }
      });

    }else {
        // if not logged in redirect to login
        window.location.href = "login_register/login.php";
    }
}


   // if user is logged in
  if (val.length < 10 ) {
      
    $(".userImg")[0].style.display="block";
    $(".userli")[0].style.display="block";

    var op = 4;
    $.ajax({
        type: 'GET',
        url: "center/ws/ws_index.php",
        dataType: 'json',
        data: { op: op, id:val},
        success: function (response) {
            if (response == -1)
                alert("Data couldn't be loaded!");
            else {
                parseImage1(response);
            }
        },
    });
   

    function parseImage1(response){

        user_img.src= "images/" + response[0].patient_image;  
        user_name.innerText = response[0].p_first_name.charAt(0).toUpperCase()  + response[0].p_first_name.slice(1);
    }
  
  }else{
      $(".login")[0].style.display="block";
  }



});