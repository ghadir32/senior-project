$(document).ready(function(){
 
    var Pid = document.getElementsByClassName("userHiddenId")[0].value; 

    var fname = document.getElementById('fname');
    var mname = document.getElementById('mname');
    var lname = document.getElementById('lname');

    var gender;
    var employmentStatus =  document.querySelector("input[name='Employed']:checked");


    var StudentStatus = $("input[name='Student']:checked");

    var phonenb =  document.querySelector("input[name='phone']");
    var emergencyphone =  document.querySelector("input[name='emergencyPhone']");

    var PHistory = document.getElementById('HistoryTxtArea');
    var Pcity = document.getElementById('inputCity');

    var PAddress = document.getElementById('inputAddress');
    var famNb = document.getElementById('famNb');

    var birthday = document.getElementById('birthday');
   

    var referralreason = document.getElementById('referralreason');
    var maritalStatus ;
    $("select.mar").change(function(){
        maritalStatus = $(this).children("option:selected").val();
    });

    var submitbtn = document.getElementById('submitbtn');

    $(document).on('click','#submitbtn', function(){
        // window.location.href = "./patient_make_appointment.php";

            employmentStatus =document.querySelector("input[name='Employed']:checked").value ;
            StudentStatus =  document.querySelector("input[name='Student']:checked").value;
            gender =  document.querySelector("input[name='gender']:checked").value;
            phonenb = phonenb.value.slice(0,2) + phonenb.value.slice(3,6) + phonenb.value.slice(7,10);

            emergencyphone =  emergencyphone.value.slice(0,2) + emergencyphone.value.slice(3,6) + emergencyphone.value.slice(7,10);
                var age= birthday.value;  
                var currdate = new Date();
              
                
               age = currdate.getFullYear() - age.slice(0,4);

     
                if(fname.value == "" || mname.value == "" || lname.value == "" || employmentStatus == "" ||  gender == "" || StudentStatus == "" || phonenb == "" || birthday.value == ""
                || emergencyphone == "" || PHistory.value == "" || Pcity.value == "" || PAddress.value == ""
                || famNb.value == "" || referralreason.value == "" || maritalStatus == "choose") {

                    var ww = document.getElementById('warningp');
                    ww.style.display = "block";
                    window.scrollTo({ top: ww, behavior: 'smooth'});
                }
                else{
             

                    var op=1;
                    $.ajax({
                        type: 'GET',
                        url: "./ws/ws_formFilling.php",
                        dataType: 'json',
                        data: 
                        { op: op, Pid:Pid, fname:fname.value, mname:mname.value, lname:lname.value, age:age, gender:gender, employmentStatus:employmentStatus, StudentStatus:StudentStatus, 
                        phonenb:phonenb, emergencyphone:emergencyphone, PHistory:PHistory.value, 
                        Pcity:Pcity.value, PAddress:PAddress.value, famNb:famNb.value, referralreason:referralreason.value, maritalStatus:maritalStatus},
                        
                        success: function (response) {
                            // window.history.go(-2);
                            window.location.href = "./patient_make_appointment.php";

                            // window.close();
                            if (response == "")
                            console.log("Data couldn't be loaded!");    
                            else {
                                // window.history.go(-2);   
                                window.location.href = "./patient_make_appointment.php";

                            }
                        },
                        error: function (xhr, status, errorThrown) {
                            alert(status + errorThrown);
                        }
                    });
                }

        });



});