$(document).ready(function(){

    $(".viewDrLink").click(function(e) {
        e.preventDefault();
        // Do your stuff
    });

    // check if user is logged in
    var val = document.getElementsByClassName("userHiddenId")[0].value; 
    // var id='p';
    // // if user is logged in
    // if ( val == 1 ) {
    //     $(".userImg")[0].style.display="block";
    //     $(".userli")[0].style.display="block";
    
    // }else   {
    //     $(".login")[0].style.display="block";
    // }


    $("#bookbtn").click(function() {
        bookAppointment();
        
    });


  


    function bookAppointment(){

        //check if logged in, if yes check if they have row in patients table 
     if ( val.length < 10 ) {   

        
        //check if the user data is filled, if yes redirect to book app page or fill the form
        var op = 3;
        $.ajax({
            type: 'GET',
            url: "./center/ws/ws_index.php",
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
            }
          });

        }else {
            // if not logged in redirect to login
            window.location.href = "login_register/login.php";
        }
    }




      // get dr list based on treatment
      var DrsLink = document.getElementsByClassName('viewDrLink');
      $(document).on('click','.viewDrLink', function(){
  
        var treatment = this.id;
        var op = 2;
        $.ajax({
            type: 'GET',
            url: "./center/ws/ws_index.php",
            dataType: 'json',//////////dr id
            data: { op: op, treatment: treatment},
            
            success: function (response) {
                if (response == "")
                   alert("Data couldn't be loaded!");    
                  else {
                    parseDrlist(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
          });


          function parseDrlist(response){
            $('.patients-links').empty();

            var patientsUl = document.querySelector(".patients-links");
            var len = response.length;

            for(var i=0; i<len; i++){

                     // alert(response[i].patients);
                    var doctor_id = response[i].doctor_id;
                    var Drname = response[i].Drname;
                    var name = Drname.charAt(0).toUpperCase() + Drname.slice(1);

                     var Pli= '<li class="liPatients" id='+doctor_id+'  > <a href="center/view_doctor_profile.php?doctor_id='+doctor_id+' "> '+  name+'</a>  </li> ';
                     patientsUl.innerHTML += Pli; 
     
             }
        }

        document.addEventListener('mouseup', function(ev) {
            let v = ev.target;
            var vv =  document.getElementsByClassName("patients-links")[0];
            if(!vv.contains(ev.target) && 
            $('#ulp').is(":visible")){
            
                document.getElementsByClassName("patients-links")[0].style.display="none";
                // document.getElementsByClassName("side_arrow")[0].style.display="none";
    
            } 
         
        });
      
     });

     $(document).on('click','.viewDrLink', function(){

        document.getElementsByClassName("patients-links")[0].style.display="block";
        // document.getElementsByClassName("side_arrow")[0].style.display="block";
     });


    getDrNb();
    function getDrNb(){
        var op = 1;
        $.ajax({
            type: 'GET',
            url: "./center/ws/ws_index.php",
            dataType: 'json',//////////dr id
            data: { op: op},
            
            success: function (response) {
                if (response == "")
                   alert("Data couldn't be loaded!");    
                  else {
                    parseDrNb(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });


        function parseDrNb(response){
            document.getElementById("nbOfDrs").innerHTML = response[0].countDr;
        }

    }
 

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                document.querySelectorAll(".animated")[0].classList.add("fadeInLeft");
                document.querySelectorAll(".animated")[1].classList.add("fadeInBottom");
                document.querySelectorAll(".animated")[2].classList.add("fadeInRight");
            }

        });
    })

    observer.observe(document.querySelector(".howContainer"));
});





$(document).ready(function(){




    $(window).scroll(testScroll);
    var viewed = false;
    
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
    
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
    
        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
    
    function testScroll() {
      if (isScrolledIntoView($(".statistics")) && !viewed) {
          viewed = true;
          $('.value').each(function () {
          $(this).prop('Counter',0).animate({
              Counter: $(this).text()
          }, {
              duration: 4000,
              easing: 'swing',
              step: function (now) {
                  $(this).text(Math.ceil(now));
              }
          });
        });
      }
    }




});
      