$(document).ready(function(){
    var DOC_ID;
    DOC_ID = document.getElementsByClassName("userHiddenId")[0].value; 
    var dr_image = document.getElementById("dr_image"); 
    var submitDrProfile = document.getElementById("submitDrProfile"); 

    var flagAlldata=0;
    

    $('#submitDrProfile').click(function() {
        
        getData();

        if(flagAlldata == 1){
            $(".incompleteData").fadeIn(1000);
            $(".incompleteData").fadeOut(3000);
            flagAlldata=0;
        }else{
            $(".completeData").fadeIn(1000);
            $(".completeData").fadeOut(3000);

            var op = 11;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_profile.php",
            dataType: 'json',///////doc id
            data: { op: op, id: DOC_ID},
            
            success: function (response) {
                if (response == -1)
                  alert("Data couldn't be loaded!");    
                  else {
                //    parsePrice(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
      }
      flagAlldata=0;
    });

    //changing dr image 
    $("#myfile").on("change", function(e){
        console.log(e.target.files[0].name);
        document.getElementById("dr_image").src= "../images/" + e.target.files[0].name;

        var op = 10;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_profile.php",
            dataType: 'json',///////doc id
            data: { op: op, id: DOC_ID, img:e.target.files[0].name },
            
            success: function (response) {
                if (response == -1)
                  alert("Data couldn't be loaded!");    
                  else {
                   parsePrice(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
     })

    var spec_container =  document.getElementById("spec_container");

    document.addEventListener('mouseup', function(ev) {
        let v = ev.target;
        if(v !== spec_container && !spec_container.contains(ev.target)){

            spec_container.style.display="none";
            document.getElementById("dr_spec").style.display="block";
 
        } 
     
    });
 
    
      var jobText =  document.getElementById("job");
      var viewjob =  document.getElementById("jotTitle_txt");
      var profText =  document.getElementById("proffStatement_txt");
      var viewprof =  document.getElementById("prof_sttmnt");
      var aboutText =  document.getElementById("AbtYourself_txt");
      var viewAbout =  document.getElementById("about_urslef");
      var eduText =  document.getElementById("education_txt");
      var viewEdu =  document.getElementById("edu");
      var expText =  document.getElementById("experience_txt");
      var viewexp =  document.getElementById("experience");
      var sessionPrice =  document.getElementById("session_price");
      var genderVal =  document.getElementById("viewGender");
      var Drname =  document.getElementById("DR_name_h2");
      var Drphone =  document.getElementById("phone");
      var Dremail =  document.getElementById("email");
      var DremailInput =  document.getElementById("InputEmail");

    
      

      


    $('.editt').click(function(e){
        var clickedClass = e.target.className;
        var parent_div = $(e.target).parent().parent().attr("for");

        
        switch (parent_div) {
            case "job title": 
                //$('#job').addClass('blur');
                jobText.value = viewjob.value;
                jobText.style.display="block";
                viewjob.style.display="none";
                document.addEventListener('mouseup', function(ev) {
                    let v = ev.target;
                    if(v != jobText){
                        var newdata = jobText.value;
                        updateData(newdata, "job_title"); 
                        jobText.style.display="none";
                        viewjob.value = newdata;
                        viewjob.style.display="block";
                    } 
                 
                });
             

               break;

             case "Professional statement":
                 viewprof.value = profText.value;
                 viewprof.style.display="block";
                 profText.style.display="none";
                 document.addEventListener('mouseup', function(ev) {
                    let v = ev.target;
                    if(v != viewprof){
                        var newdata = viewprof.value;
                        updateData(newdata, "professional_statement"); 
                        viewprof.style.display="none";
                        profText.value = newdata;
                        profText.style.display="block";
                    } 
                 
                });

                 break;

             case "Speciality":
                document.getElementById("spec_container").style.display="block";
                document.getElementById("dr_spec").style.display="none";
               
                     break;
             case "About Yourself":
                    viewAbout.value = aboutText.value;
                    viewAbout.style.display="block";
                    aboutText.style.display="none";
                    document.addEventListener('mouseup', function(ev) {
                        let v = ev.target;
                        if(v != viewAbout){
                            var newdata = viewAbout.value;
                            updateData(newdata, "about_yourself"); 
                            viewAbout.style.display="none";
                            aboutText.value = newdata;
                            aboutText.style.display="block";
                        } 
                     
                    });
                     break;
             case "Education":
                    viewEdu.value = eduText.value;
                    viewEdu.style.display="block";
                    eduText.style.display="none";
                    document.addEventListener('mouseup', function(ev) {
                       let v = ev.target;
                       if(v != viewEdu){
                           var newdata = viewEdu.value;
                           updateData(newdata, "education"); 
                           viewEdu.style.display="none";
                           eduText.value = newdata;
                           eduText.style.display="block";
                       } 
                    
                   });
                         break;

             case "Experience": 
                    viewexp.style.display="block";
                    expText.style.display="none";
                    viewexp.value = expText.value;
                   // viewexp.style.display="block";
                    //expText.style.display="none";
                    document.addEventListener('mouseup', function(ev) {
                        let v = ev.target;
                        if(v != viewexp){ 
                            var newdata = viewexp.value;
                            updateData(newdata, "experience"); 
                            viewexp.style.display="none";
                            expText.value = newdata;
                            expText.style.display="block";
                        } 
                     
                    });
                         break;
                 
              default: 
                break;   
          }

       
       
    });





    getPrice();
    function getPrice() {
        var op = 9;
       // var id = 2;/////MANUAL ID
       $.ajax({
           type: 'GET',
           url: "./ws/ws_profile.php",
           dataType: 'json',///////doc id
           data: { op: op, id: DOC_ID},
           
           success: function (response) {
               if (response == -1)
                 alert("Data couldn't be loaded!");    
                 else {
                  parsePrice(response);
               }
           },
           error: function (xhr, status, errorThrown) {
               alert(status + errorThrown);
           }
       });

   } 


   function parsePrice(response) {
    sessionPrice.innerHTML = "$" + response[0].session_price ;

   }







     getData();
    function getData() {
        var op = 1;
       // var id = 2;/////MANUAL ID
       $.ajax({
           type: 'GET',
           url: "./ws/ws_profile.php",
           dataType: 'json',///////doc id
           data: { op: op, id: DOC_ID},
           
           success: function (response) {
               if (response == -1)
                 alert("Data couldn't be loaded!");    
                 else {
                  parseData(response);
               }
           },
           error: function (xhr, status, errorThrown) {
               alert(status + errorThrown);
           }
       });

   } 

   function parseData(response) {

       var len = response.length;


           var id = response.doctor_id;
           var fname = response[0].first_name;
           var lname = response[0].last_name;
           var phone = response[0].Phone_number;
           var job_title = response[0].job_title;
           var prof_statement = response[0].professional_statement;
           var about_urself = response[0].about_yourself;
           var edu = response[0].education;
           var experience = response[0].experience;

          dr_image.src= "../images/" + response[0].doctor_image;

            if(job_title == "" || prof_statement == "" || about_urself =="" || edu == "" || experience == "" ){
                flagAlldata =1;
            }
            //set name
           Drname.innerHTML = fname.toUpperCase() + "  " +  lname.toUpperCase();
          // Drphone.innerHTML = phone;

          // jobText.value = job_title;
        if(job_title == ""){ 
                jobText.style.display = "block";
                viewjob.style.display = "none";
                document.addEventListener('mouseup', function(ev) {
                    let v = ev.target;
                    if(v != jobText && jobText != ""){
                        var newdata = jobText.value;
                        updateData(newdata, "job_title"); 
                        jobText.style.display="none";
                        viewjob.value = newdata;
                        viewjob.style.display="block";
                    } 
                });
        }else{
            viewjob.value =  job_title;
            jobText.style.display = "none";
            viewjob.style.display = "block";
        }

        if(prof_statement == ""){
          viewprof.style.display = "block";
          profText.style.display = "none";
          document.addEventListener('mouseup', function(ev) {
            let v = ev.target;
            if(v != viewprof && viewprof != ""){
                var newdata = viewprof.value;
                updateData(newdata, "professional_statement"); 
                viewprof.style.display="none";
                profText.value = newdata;
                profText.style.display="block";
            } 
         
        });
        }else{ 
            profText.value =  prof_statement;
            viewprof.style.display = "none";
            profText.style.display = "block";
        }

        if(about_urself == ""  ){
            document.addEventListener('mouseup', function(ev) {
                let v = ev.target;
                if(v != viewAbout && viewAbout.value != ""){
                    var newdata = viewAbout.value;
                    updateData(newdata, "about_yourself"); 
                    viewAbout.style.display="none";
                    aboutText.value = newdata;
                    aboutText.style.display="block";
                } 
            });
            viewAbout.style.display = "block";
            aboutText.style.display = "none";
          }else{
            aboutText.value =  about_urself;
            viewAbout.style.display = "none";
            aboutText.style.display = "block";
          }

          if(edu == ""){
            viewEdu.style.display = "block";
            eduText.style.display = "none";
            document.addEventListener('mouseup', function(ev) {
                let v = ev.target;
                if(v != viewEdu && viewEdu != ""){
                    var newdata = viewEdu.value;
                    updateData(newdata, "education"); 
                    viewEdu.style.display="none";
                    eduText.value = newdata;
                    eduText.style.display="block";
                } 
            });
          }else{
            eduText.value =  edu;
            viewEdu.style.display = "none";
            eduText.style.display = "block";
          } 

          if(experience == ""){
            viewexp.style.display = "block";
            expText.style.display = "none";
            document.addEventListener('mouseup', function(ev) {
                let v = ev.target;
                if(v != viewexp && viewexp.value!= ""){ 
                    var newdata = viewexp.value;
                    updateData(newdata, "experience"); 
                    viewexp.style.display="none";
                    expText.value = newdata;
                    expText.style.display="block";
                } 
            });
            
          }else{
            expText.value =  experience;
            viewexp.style.display = "none";
            expText.style.display = "block";
          }
           

    
           
   }

   function updateData(newdata, dataTitle) {
    var op = 3; 
   // var id=2;
    $.ajax({
        type: 'GET',
        url: "./ws/ws_profile.php",//// DOCTOR ID
        data: { op: op, newdata: newdata, id:DOC_ID, dataTitle: dataTitle },
        cache: false,
        success: function (response) { 
        },

    });
}


getEmail();
function getEmail() {
    var op = 2;
   // var id = 2;/////MANUAL ID
   $.ajax({
       type: 'GET',
       url: "./ws/ws_profile.php",
       dataType: 'json',///////doc id
       data: { op: op, id: DOC_ID},
       
       success: function (response) {
           if (response == -1)
             alert("Data couldn't be loaded!");    
             else {
              parseEmail(response);
           }
       },
       error: function (xhr, status, errorThrown) {
           alert(status + errorThrown);
       }
   });

 } 

 function  parseEmail(response){
     var email = response[0].email;
    Dremail.innerHTML = email;
    document.getElementById("InputEmail").value = email; 

    }

    document.addEventListener('mouseup', function(ev) {
        let v = ev.target;
        if(v != DremailInput){
           updateEmail(DremailInput.value);
           DremailInput.style.display = "none";
           getEmail();

        }
        
     
    });

    function updateEmail(newEmail) {
        var op = 8; 

        $.ajax({
            type: 'GET',
            url: "./ws/ws_profile.php",
            data: { op: op,  id:DOC_ID, newEmail: newEmail },
            cache: false,
            success: function (response) { 
            },

        });
    }

    $('#editemaildiv').click(function(e){
        DremailInput.style.display = "block";
    });
    



   //get all  specliaities list
   getSpec();
   function getSpec() {
       var op = 4;
       $.ajax({
          type: 'GET',
          url: "./ws/ws_profile.php",
          dataType: 'json',
          data: { op: op},
          
          success: function (response) {
              if (response == -1)
                alert("Data couldn't be loaded!");    
                else {
                 parseSpec(response);
              }
          },
          error: function (xhr, status, errorThrown) {
              alert(status + errorThrown);
          }
      });
    } 

    function parseSpec(response){
        var len = response.length;
        var ul = document.querySelector(".spec_ul");

        for (var i = 0; i < len; i++) {

            var id = response[i].spec_id;
            var spec_name = response[i].spec_name;

            var specName =  '<p id='+id+' class="spec_p_li">' +    spec_name +  '</p>';
            if(i==0){
                ul.innerHTML += '<li  id='+id+' class="list-group-item active">'+ specName +'</li>';
            }else{
                ul.innerHTML += '<li  id='+id+' class="list-group-item ">'+ specName +'</li>';
            }
        }

    }

 
    function CheckSpec(response){
        var len = response.length;
        var ul = document.querySelector(".spec_ul");
            ul.onclick = function(event) {
                var mytarget = event.target;
                CheckSpec(response);
                var flag=0;
                $("#specialities_chosing").children().children()
                .each(function () {
                    var element_name = $(this).get(0).innerHTML;
                    var spec_nm = element_name.split('<')[0];
                   
                    if(mytarget.innerHTML == spec_nm){
                        //show this exists div
                        $(".alert-light").fadeIn(1000);
                        $(".alert-light").fadeOut(3000);
                        flag=1;
                       // return;
                    }
                    return;
                });
                
                    if(flag == 1 ){
                        return;
                    }
        
                    var counter=0;
                    for(var i=0; i<len; i++){
                        
                        if(response[i].spec_name == mytarget.innerHTML){
                            alert('this value exists');
                            $(".alert-light").fadeIn(1000);
                            $(".alert-light").fadeOut(3000);
                            return;
                        }else{
                            counter++;
                            if(counter == len){
                                    fill_new_spec(mytarget.innerHTML, mytarget.id );
                                    add_spec_toDB(mytarget.id);
                                    // CheckSpec();
                                    return;
                                }
                        }
                    }
            }; 
    }


    function add_spec_toDB(new_spec){
        var op = 6;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_profile.php",
            dataType: 'json',//////////dr id
            data: { op: op, id: DOC_ID, newSpec: new_spec},
            
            success: function (response) {
                if (response == null)
                   alert("Data couldn't be loaded!");    
                  else {
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
 
    //get specliaities
    get_Dr_Spec();
    function get_Dr_Spec() {
        var op = 5;
        $.ajax({
           type: 'GET',
           url: "./ws/ws_profile.php",
           dataType: 'json',////////////dr id
           data: { op: op, id:DOC_ID},
           
           success: function (response) {
               if (response == null)
                //  alert("Data couldn't be loaded!");    
                document.getElementById("no_spec").style.display = "block";
                else {
                  CheckSpec(response);
                  parse_Dr_Spec(response);
               }
           },
           error: function (xhr, status, errorThrown) {
               alert(status + errorThrown);
           }
       });
     } 

     var Spec_div = document.querySelector(".spec_chosen");
     var Spec_div_chosing = document.querySelector(".choosing_spec");

     function parse_Dr_Spec(response){
        var len = response.length;

        for (var i = 0; i < len; i++) {
            var spec_name = response[i].spec_name;
            fill_new_spec(spec_name, response[i].spec_id);
           // alert(response[i].spec_id +" hi");
        }

     }

     var ul = document.querySelector(".spec_ul");

     ul.onclick = function(event) {
         var mytarget = event.target;
         //alert(mytarget.innerHTML);
         
       fill_new_spec(mytarget.innerHTML, mytarget.id);
       add_spec_toDB(mytarget.id);
       document.getElementById("no_spec").style.display = "none";
     }; 

     function fill_new_spec(spec_name, id){
        var cross_icon = '<i style="display: inline; margin: 0px 0px 5px 4px; cursor:pointer; font-size: 19px;" class="fas fa-times deleteIcon"></i>';
        var spc_txt =  '<p class="speciality_text">' +
            spec_name + cross_icon + '</p>';

            var specName =  '<p class="speciality_text">' +    spec_name +  '</p>';
            Spec_div.innerHTML += ' <div class="single_spe rounded-lg">'+ specName +'</div>';
            Spec_div_chosing.innerHTML += ' <div class="single_spe rounded-lg" id='+id+'  >'+ spc_txt +'</div>';
     }

     
    $(document).ready(function(){

        $(document).on("click", ".deleteIcon", function() {  
            var delSpec_id = $(this).parent().parent().attr('id');
            var element_name = $(this).parent().get(0).innerHTML;
            var spec_nm = element_name.split('<')[0];

            var op = 7;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_profile.php",
                dataType: 'json',//////manual dr id
                data: { op: op, id:DOC_ID, spec_id:delSpec_id},
                
                success: function (response) {
                    if (response == null)
                       alert("Data couldn't be loaded!");    
                      else {
                    }
                },
                error: function (xhr, status, errorThrown) {
                    alert(status + errorThrown);
                }
            });

            //remove it from spec choosing
            $(this).parent().parent().remove();
            var t=0;
            $("#specialities_chosen").children().children()
            .each(function () {
                
                var element = $(this)[0].innerHTML;
                var mdre = $(this).parent().parent().children()[t];
                //remove mn specialities li barra
                if(spec_nm == element){
                   mdre.remove();
                }else{
                    //alert("msh nafso");
                }
                t++;
            });
    
           

        });
      
    });

      // search in lu  psecialities
      $(document).ready(function () {
        $("#search_id").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".list-group-item").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

 


});

