$(document).ready(function () {


    if($("#patient_id").val() != ""){
        getpatieninformation($("#patient_id").val());
    }
   // var patient_id = $("#patient_id").val();
   var doctor_id;
   doctor_id= document.getElementsByClassName("userHiddenId")[0].value; 
    // var doctor_id=11;
    var patientimg = document.getElementById('patientimg');
    var showApp = document.getElementById('showAppBtn');
    var  AppDiv = document.getElementsByClassName('appointmentdetails');
    var submitDate = document.getElementById('submitDate');
    var patientt_id =$("#patient_id").val() ;
    
    var lastsessionNote = document.getElementById('lastsessionNote');
    var txtareaNote = document.getElementById('txtareaNote');

    var sendDate='1111-11-11';
    getPatients();
    //getpatieninformation();
    function getpatieninformation(patient_id) {
        var op = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patients.php",
            dataType: 'json',
            data: { op: op, patient_id: patient_id },

            success: function (response) {
                if (response == null)
                    alert("Data couldn't be loaded!");

                else {
                    parsepatientinformation(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
    function parsepatientinformation(response) {
        var fullname = response[0].patients_full_name;
        var email = response[0].email;
        var phone = response[0].p_phone_number;

        var location = response[0].location;

        var nb_of_family = response[0].nb_of_family;
        var employed = response[0].employed_or_not;

        var description = response[0].description;
        var age = response[0].p_age;
        var gender = response[0].p_gender;
        patientimg.src="../images/" + response[0].patient_image;
        var stu = response[0].student_or_not;
        var history = response[0].history;
        var city = response[0].city;
        var emergency_nb = response[0].emergency_nb;
        var marital_status = response[0].marital_status;



        $("#name").text(fullname);
        $("#phone_number").text("Phone Number: " + phone);
        $("#email").text("Email Address: " + email);

        $("#nb_of_family").text(nb_of_family);
        $("#employed").text(employed);
        $("#gender").text(gender);
        $("#age").text(age);

        $("#stu").text(stu);
        $("#history").text(history);
        $("#city").text(city);
        $("#emergency_nb").text(emergency_nb);
        $("#marital_status").text(marital_status);


        $("#location").text(location);
        $("#description").text(description);
    }


    function getPatients() {
        var op = 2;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patients.php",
            dataType: 'json',
            data: { op: op,doctor_id:doctor_id },
            success: function (response) {

                parsepatients(response);
            },
        });
    }
    function parsepatients(response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
            var patients_name = response[i].patientName;
            var patient_id = response[i].patient_id;
            // var item = "<option data-patient-id='" + patient_id + "' value=" + patients_name + ">" + patients_name + "</option>";
            // var item = "<option data-patient-id='" + patient_id + "' value=" + patients_name + ">" + patients_name + "</option>";

            var item = "<a  class='dropdown-item' id='" + patient_id + "'  href='#'  value=" + patients_name + ">" + patients_name + "</a>";

            //$("#selectpatient").append(item);
            $("#dropdownn").append(item);
            // $(".dropdown-content").append(item);

        }
    }
    
    var patientsList = document.getElementById("dropdownn");

    patientsList.addEventListener('click', function(ev) {
        let v = ev.target;
       // alert(v.id);
        $("#patient_id").val() == "";
        getpatieninformation(v.id);
        patientt_id = v.id;
        sendDate='1111-11-11';
        getpatientAppDetails(sendDate);
        var btn  = document.getElementById('showAppBtn');
        btn.style.display = 'block';

    });



    showApp.addEventListener('click', function() {

        //////get date and all previous appointment dates for this patient
        var op = 3;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patients.php",
            dataType: 'json',
            data: { op: op, patient_id: patientt_id, doc_id : doctor_id  },

            success: function (response) {
                if (response == null)
                    alert("Data couldn't be loaded!");

                else {
                    parsepatientPrevAppDates(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });

        getpatientAppDetails(sendDate);


        //get most recent app note and date
        // var op = 4;
        // $.ajax({
        //     type: 'GET',
        //     url: "./ws/ws_patients.php",
        //     dataType: 'json',
        //     data: { op: op, patient_id: patientt_id, doc_id : doctor_id, sendDate :sendDate},

        //     success: function (response) {
        //         if (response == null)
        //             alert("Data couldn't be loaded!");

        //         else {
        //             parseDateAndNotes(response);
        //         }
        //     },
        //     error: function (xhr, status, errorThrown) {
        //         alert(status + errorThrown);
        //     }
        // });


        AppDiv[0].style.visibility='visible';
        $('html, body').animate({
            scrollTop: $("#detdiv").offset().top
        }, 2000);
    });


   
    function parsepatientPrevAppDates(response){
        var length = response.length;
        var sell = document.getElementById("checkBoxes");
        $("#checkBoxes").empty();

      for(var i=0; i< length; i++){ 

        var items =  "<input class='inputdate' type='radio' value="+response[i].date+" name='datesO'   id="+response[i].s_id+">"+response[i].date ;
            var labell = '<label for="first" class="labelDate">' + items +'</label>';   
            sell.innerHTML += labell;

        }
    }

  
    submitDate.addEventListener('click', function() {
        sendDate  = document.querySelector('input[name="datesO"]:checked').value;

        getpatientAppDetails(sendDate);
        // var op = 4;
        // $.ajax({
        //     type: 'GET',
        //     url: "./ws/ws_patients.php",
        //     dataType: 'json',
        //     data: { op: op, patient_id: patientt_id, doc_id : doctor_id, sendDate :sendDate},

        //     success: function (response) {
        //         if (response == null)
        //             alert("Data couldn't be loaded!");

        //         else {
        //             parseDateAndNotes(response);
        //         }
        //     },
        //     error: function (xhr, status, errorThrown) {
        //         alert(status + errorThrown);
        //     }
        // });
    });


  

    function getpatientAppDetails(sendDate) {
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_patients.php",
            dataType: 'json',
            data: { op: op, patient_id: patientt_id, doc_id : doctor_id, sendDate :sendDate},

            success: function (response) {
                if (response == null)
                    alert("Data couldn't be loaded!");

                else {
                    parseDateAndNotes(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    };


    function parseDateAndNotes(response){
        var DateV = document.getElementById("AppDate");
        var noteV = document.getElementById("Appdescription");
        DateV.innerHTML = "Date: " + response[0].date;
        if(response[0].notes == ""){
            noteV.innerHTML = "You didnt write any notes for this session.";
        }else{
             noteV.innerHTML = response[0].notes;
        }
        var now     = new Date(); 
        var day     = now.getDate();
        var sessDate = response[0].date;
        var todayDate = new Date().toISOString().slice(0, 10);
        // var session =  new Date(year, monthIndex, day, hours)


        // alert(recentsessionDate+ " h        " + now);
        var sessday = response[0].date.slice(8,10);
        var sessdyear = response[0].date.slice(0,4);
        var sessmonth =  response[0].date.slice(5,7);
        var mo = parseInt(sessmonth);
        mo = mo - 1;
        var recentsessionDate = new Date(sessdyear, mo, sessday) ;


        // alert(recentsessionDate.getTime() +"  lyom: +  " + now.getTime());
        if(recentsessionDate.getTime() > now.getTime()){
                noteV.innerHTML = "*session has not been done yet*";

        }else if(recentsessionDate.getTime() <= now.getTime()){
            const diffTime = Math.abs(now - recentsessionDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if(diffDays < 5){
                //allow dr to make session notes
                if(response[0].notes == ""){
                    document.getElementsByClassName("lastsessnotes")[0].style.display = "block";
                    lastsessionNote.addEventListener('click', function() {

                        // alert(txtareaNote.value);
                        var op = 5;
                        $.ajax({
                            type: 'GET',
                            url: "./ws/ws_patients.php",
                            dataType: 'json',
                            data: { op: op, patient_id: patientt_id, doc_id : doctor_id, DrNote :txtareaNote.value, sessdate:sessDate },
                
                            success: function (response) {
                                if (response == null)
                                    alert("Data couldn't be loaded!");
                
                                else {
                                 document.getElementsByClassName("lastsessnotes")[0].style.display = "none";
                                 noteV.innerHTML = txtareaNote.value;


                                }
                            },
                            error: function (xhr, status, errorThrown) {
                                alert(status + errorThrown);
                            }
                        });

                    });

                }


            }else{
              // dont allow dr to make session notes
              document.getElementsByClassName("lastsessnotes")[0].style.display = "none";

            }

        }

    }

});

 