$(document).ready(function(){

    
    var x=0, y=0;
    var startDATE ;
    var endDATE ;
    var savestartDate ;
    var startdateObject, enddateObject;
    var DOC_ID;
    DOC_ID = document.getElementsByClassName("userHiddenId")[0].value; 
    // var usrId = document.getElementsByClassName("userHiddenId")[0].value;
    var oldtodate;



    // GetDrId();
    // function GetDrId(){
    //     var op = 6;
    //     $.ajax({
    //         type: 'GET',
    //         url: "./ws/ws_availability.php",
    //         dataType: 'json',//////////dr id
    //         data: { op: op, id: usrId},
            
    //         success: function (response) {
    //             if (response == "")
    //                alert("Data couldn't be loaded!");    
    //               else {
    //                  DOC_ID = response[0].doctor_id;
    //                 alert(DOC_ID);
    //                 }
    //         },
    //         error: function (xhr, status, errorThrown) {
    //             alert(status + errorThrown);
    //         }
    //     });
    // }


    


    getDates();
    function getDates(){
        var op = 4;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_availability.php",
            dataType: 'json',//////////dr id
            data: { op: op, id: DOC_ID},
            
            success: function (response) {
                if (response == "")
                   alert("Data couldn't be loaded!");    
                  else {
                      parse2Dates(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });


        function parse2Dates(response){
            // if(response.start_date != null && response.end_date != null){ 
            document.getElementById("datepickerStart").value =  response[0].start_date.slice(8,10) +', ' + response[0].start_date.slice(5,7) +', ' + response[0].start_date.slice(0,4) ;
            $("#datepickerStart").prop('disabled', true);
            document.getElementById("datepickerEnd").value =  response[0].end_date.slice(8,10) +', ' + response[0].end_date.slice(5,7) +', ' + response[0].end_date.slice(0,4) ;
            oldtodate =  response[0].end_date.slice(8,10) +', ' + response[0].end_date.slice(5,7) +', ' + response[0].end_date.slice(0,4) ;

            // }else{
            //     console.log("no start and end time yet");
            // }
        }

    }
 

        //start date
        $( "#datepickerStart" ).datepicker({
        dateFormat: "D, dd,mm, yy",
        minDate: +1,
        beforeShowDay:disableSundays,
        showAnim: "fade",
        onSelect: function (date, datepicker) {
            if (date != "") {
               $("#datepickerEnd").datepicker("option", "minDate", date);
                startDATE = $(this).datepicker({ dateFormat: 'dd-mm-yy' }).val();
             // startDATE1 = dateAsObject.toJSON().slice(0, 10);
              savestartDate = date.slice(5,16);

              var dateParts = savestartDate.split(",");
              // month is 0-based, that's why we need dataParts[1] - 1:  yyyy-mm-dd
              startdateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 
            
            }}

        });

    

        //end date
        $( "#datepickerEnd" ).datepicker({
            dateFormat: "D, dd,mm, yy",
            beforeShowDay:disableSundays,
            showAnim: "fade",
            maxDate: "+1Y +6m",
            onSelect: function (date, datepicker) {
                if (date != "") {             
                   endDATE = $(this).datepicker({ dateFormat: 'dd-mm-yy' }).val();
                 // startDATE = dateAsObject.toJSON().slice(0, 10);
                //  alert(endDATE + "   endddd");
                  saveendDate = date.slice(5,16);
                     //   alert(saveendDate);
                  var dateParts = saveendDate.split(",");
              
                  // month is 0-based, that's why we need dataParts[1] - 1:  yyyy-mm-dd
                  enddateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 
              
                }}

        });

          

      //disabling sundays
      function disableSundays(sunday){
        var calendarDay = sunday.getDay();
        return [ (calendarDay > 0) ];
      }


 
     const days = [];
    $('.ss').click(function() {
        if ($(this).is(':checked')) {
            //myFunction($(this).val());
         //  alert($(this).val()); 
           days.push($(this).val());

          }
           
      });



     $('#chooseTime').click(function() {

        document.getElementById('chooseTimes').style.display = "block";

        var checkboxes = $('input[name=weekday]:checked').length;
        if(checkboxes === 0 ){ 
            document.getElementsByClassName('daysmissedAlert')[0].style.display = "block";
            $(".daysmissedAlert").fadeOut(3000);
        }
        if(checkboxes !== 0){
            document.getElementById('submitTime').style.display = "block";

        }

        if(   document.getElementById('datepickerStart').value === "" ||  document.getElementById('datepickerEnd').value === ""    ){
         

         } 
      //  alert(checkboxes);
        var numItems = $('.spanspace').length;
        //alert(numItems);
        var count;
        $('input[name=weekday]:checked').each(function () {
                count=0;
        
            var dayy = $(this).val();
            var flag=0;
           if( numItems> 0 ){
                $('.spanspace').each(function () {

                     if(dayy == $(this).text().slice(0,3)){
                            flag=1;
                            return;
                     }else{
                        // alert("not equal");
                     }
                
                    return;
                 });
                 if(flag == 0){
                    addtoList(dayy);
                 }
                 return;

            }else{
               // alert("np spannnss");
                addtoList(dayy);
                return;
            }

            
            function addtoList(){
                    x++; 
                    var timeinput = document.querySelector("#chooseTimes");
                    var dayname = '<span id= "daynameSpan" class="spanspace" >' + dayy + ' ' + '</span>';
                    var label = '<label>  From: </label>';
                    var fromTime =  ' <input type="text"  placeholder="8:00 AM"  readonly="readonly"   class="timepickerStart'+ x +'">';
                    var fromDiv =  ' <div class="dateInput fromtime">' + dayname + label + fromTime + '</div>';
                    var Tolabel = '<label>  To: </label>';
                    var toTime =  ' <input type="text"  placeholder="3:00 PM"  readonly="readonly"   class="timepickerEnd'+ x +'">';

                    var ToDiv =  ' <div class="dateInput totime">' + Tolabel + toTime + '</div>';
                    var deleteDay =  '<i class="fas fa-trash-alt deleteDay"></i>';
                    timeinput.innerHTML += '<div class="times">' + deleteDay +  fromDiv + ToDiv + '</div>';


            // start time 1
            $( ".timepickerStart1" ).timepicker({
            timeFormat: 'h:mm p',

            interval: 30,
            minTime: '8',
            maxTime: '2:00pm',
            // defaultTime: '8',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true.valueOf,
                change: function(time) {
                        $(".timepickerEnd1").timepicker("option", "minTime", time);
                    // alert(time);
                    }
                });


            //end time 1
            $( ".timepickerEnd1" ).timepicker({
                timeFormat: 'h:mm p',
                interval: 30,
            //  minTime: '8',
                maxTime: '3:30pm',
            //  defaultTime: '8',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true.valueOf,
                onSelect: function (time, datepicker) {
                    if (date != "") {
                // alert(time);
                    }
                }

                });  // start time 2
                $( ".timepickerStart2" ).timepicker({
                    timeFormat: 'h:mm p',
                    interval: 30,
                    minTime: '8',
                    maxTime: '2:00pm',
                // defaultTime: '8',
                    startTime: '10:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true.valueOf,
                    change: function(time) {
                        $(".timepickerEnd2").timepicker("option", "minTime", time);
                    }
                });


            //end time 2
            $( ".timepickerEnd2" ).timepicker({
                timeFormat: 'h:mm p',
                interval: 30,
            //  minTime: '8',
                maxTime: '3:30pm',
            // defaultTime: '8',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true.valueOf,
                onSelect: function (time, datepicker) {
                    if (date != "") {
                //  alert(time);
                    }
                }

                });  // start time 3
                $( ".timepickerStart3" ).timepicker({
                    timeFormat: 'h:mm p',
                    interval: 30,
                    minTime: '8',
                    maxTime: '2:00pm',
                //  defaultTime: '8',
                    startTime: '10:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true.valueOf,
                    change: function(time) {
                        $(".timepickerEnd3").timepicker("option", "minTime", time);
                    }
                });


            //end time 3
            $( ".timepickerEnd3" ).timepicker({
                timeFormat: 'h:mm p',
                interval: 30,
            //  minTime: '8',
                maxTime: '3:30pm',
            //  defaultTime: '8',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true.valueOf,
                onSelect: function (time, datepicker) {
                    if (date != "") {
                //  alert(time);
                    }
                }

                });  // start time 4
                $( ".timepickerStart4" ).timepicker({
                    timeFormat: 'h:mm p',
                    interval: 30,
                    minTime: '8',
                    maxTime: '2:00pm',
                //  defaultTime: '8',
                    startTime: '10:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true.valueOf,
                    change: function(time) {
                        $(".timepickerEnd4").timepicker("option", "minTime", time);
                    }
                });


            //end time 4 
            $( ".timepickerEnd4" ).timepicker({
                timeFormat: 'h:mm p',
                interval: 30,
            //  minTime: '8',
                maxTime: '3:30pm',
            // defaultTime: '8',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true.valueOf,
                onSelect: function (time, datepicker) {
                    if (date != "") {
                // alert(time);
                    }
                }

                });  // start time 5
                $( ".timepickerStart5" ).timepicker({
                    timeFormat: 'h:mm p',
                    interval: 30,
                    minTime: '8',
                    maxTime: '2:00pm',
                //   defaultTime: '8',
                    startTime: '10:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true.valueOf,
                    change: function(time) {
                        $(".timepickerEnd5").timepicker("option", "minTime", time);
                    }
                });


            //end time 5
            $( ".timepickerEnd5" ).timepicker({
                timeFormat: 'h:mm p',
                interval: 30,
            //  minTime: '8',
                maxTime: '3:30pm',
            //   defaultTime: '8',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true.valueOf,
                onSelect: function (time, datepicker) {
                    if (date != "") {
                   // alert(time);
                    }
                }

                });  // start time 6
                $( ".timepickerStart6" ).timepicker({
                    timeFormat: 'h:mm p',
                    interval: 30,
                    minTime: '8',
                    maxTime: '2:00pm',
                // defaultTime: '8',
                    startTime: '10:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true.valueOf,
                    change: function(time) {
                        $(".timepickerEnd6").timepicker("option", "minTime", time);
                    }
                });


            //end time 6
            $( ".timepickerEnd6" ).timepicker({
                timeFormat: 'h:mm p',
                interval: 30,
            //  minTime: '8',
                maxTime: '3:30pm',
            //  defaultTime: '8',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true.valueOf,
                onSelect: function (time, datepicker) {
                    if (date != "") {
                // alert(time);
                    }
                }

                });
            }
    //    }

    });

     });

     $(document).on("click", ".deleteDay", function(e) {
        e.preventdefault;
        $(this).parent().remove();
      });

     $('#submitTime').click(function() {

        //id dates are empty warning txt
        if($('#datepickerStart').val() == "" || $('#datepickerEnd').val() == ""){
            document.getElementsByClassName('datesmissedAlert')[0].style.display = "block";
            $(".datesmissedAlert").fadeOut(3000);

        }else{
           var starttdate;
           starttdate = $('#datepickerStart').val().slice(12, 16) + '-' + $('#datepickerStart').val().slice(8, 10)  + '-' +$('#datepickerStart').val().slice(5, 7) ;

           var endddate = $('#datepickerEnd').val().slice(12, 16) + '-' + $('#datepickerEnd').val().slice(8, 10)  + '-' +$('#datepickerEnd').val().slice(5, 7) ;

           if( $("#datepickerStart").prop('disabled') == true ){
            starttdate = '1111-11-11';
            // endddate =  $('#datepickerEnd').val().slice(8, 12) + '-' + $('#datepickerEnd').val().slice(4, 6)  + '-' +$('#datepickerEnd').val().slice(0, 2);
            var endddate = $('#datepickerEnd').val().slice(12, 16) + '-' + $('#datepickerEnd').val().slice(8, 10)  + '-' +$('#datepickerEnd').val().slice(5, 7) ;
          }

          var flag2=0;

          if( $("#datepickerStart").prop('disabled') == true ){
            var saveendDate =  document.getElementById("datepickerEnd").value;
            saveendDate = saveendDate.slice(5,16);
            var dateParts = saveendDate.split(",");

            enddateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 

            var dateParts1 = oldtodate.split(",");
              
            startdateObject = new Date(+dateParts1[2], dateParts1[1] - 1, +dateParts1[0]); 
            // alert("loop from:  " + startdateObject +  "to    " + enddateObject );

            if(startdateObject  > enddateObject){ flag2=1; }
        
        }

          
        if(flag2 == 1){
            document.getElementsByClassName('datesextendAlert')[0].style.display = "block";
            $(".datesextendAlert").fadeOut(3000); 
            }else{
            var op = 5;
                $.ajax({
                    type: 'GET',
                    url: "./ws/ws_availability.php",
                    dataType: 'json',//////////dr id
                    data: { op: op, id: DOC_ID, startdate1 : starttdate, enddate1: endddate},
                    
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


            $('.spanspace').each(function  () {

                var DAYname = $(this).text();
                var STARTtime = $(this).next().next().val();       
                var ENDtime = $(this).parent().next().children("input").val();

                if(STARTtime == "" || ENDtime == ""){
                     document.getElementsByClassName('timemissedAlert')[0].style.display = "block";
                    $(".timemissedAlert").fadeOut(3000);
                }else{
                    sendDateAndTime(DAYname, STARTtime, ENDtime);
                    document.getElementById('chooseTimes').style.display = "none";
                    document.getElementById('submitTime').style.display = "none";

                }
                
            });
        }
        
     });



     function sendDateAndTime(DAYname, STARTtime, ENDtime){
         var sendstarttime, sendendtime;
     
        var fhour;
        function get_time(timee) {
      
            var cur_hour = timee;
            var hourr = cur_hour.split(':');
            var cc = cur_hour.split(" ");
            cc= cc[1];

            if(cc == 'PM'){
                if(hourr[0] != '12'){

                    var hr = parseInt(hourr[0],10) + 12;
                    var minn = hourr[1].slice(0,2);
                     fhour  = hr +":" + minn;

                    return 1;
                }else{
                    return 0;
                }

            }else{
                return 0;
            }

          }

         if(get_time(STARTtime) == 1){
            sendstarttime = fhour;
        }else if(get_time(STARTtime) == 0){
            sendstarttime = STARTtime.slice(0,5);
        }

        if(get_time(ENDtime) == 1){
            sendendtime = fhour;
        }else  if(get_time(STARTtime) == 0){
            sendendtime =ENDtime.slice(0,5);    
        }

        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        
         var day;

         var u = new Date(startdateObject);

         for ( day= u; day <= enddateObject; day.setDate(day.getDate() + 1)) {
                       
         let date = JSON.stringify(day);
           currentDate = new Date(JSON.parse(date));
           if(DAYname.slice(0,3) == (days[day.getDay()].slice(0,3)) ){


            var dd= convert(currentDate);

                var op = 1;
                $.ajax({
                    type: 'GET',
                    url: "./ws/ws_availability.php",
                    dataType: 'json',//////////dr id
                    data: { op: op, id: DOC_ID, date: dd, startTime: sendstarttime, endTime: sendendtime},
                    
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
                document.getElementsByClassName('daysOnsuccess')[0].style.display = "block";
                $(".daysOnsuccess").fadeOut(3000);



           }else{
               // alert("not equall");
           }

        
           

            function convert(str) {

                var mnths = {
                    Jan: "01",
                    Feb: "02",
                    Mar: "03",
                    Apr: "04",
                    May: "05",
                    Jun: "06",
                    Jul: "07",
                    Aug: "08",
                    Sep: "09",
                    Oct: "10",
                    Nov: "11",
                    Dec: "12"
                    },
                    date = str.toString().split(" ");
                
                return [date[3], mnths[date[1]], date[2]].join("-");
            }


        }

     }
   
    
            getWorkdates();
            function getWorkdates(){
         //  filling dates of work t the select option with the ability to uncheck

         var op = 2;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_availability.php",
            dataType: 'json',//////////dr id
            data: { op: op, id: DOC_ID},
            
            success: function (response) {
                if (response == null)
                    console.log("wrong");
                else {
                    parseDates(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
     }

     function pad(n) {
        return (n < 10 ? '0' : '') + n;
    }
     function getDateToday() {
        var date = new Date();
        var month = pad(date.getMonth() + 1);
        var day = pad(date.getDate());
        var year = date.getFullYear();

        var date_data = year + "-" + month + "-" + day;
        return date_data;

    }

     function parseDates(response){ 
        let date_ob = getDateToday();
         
        var length = response.length;
        var sell = document.getElementById("checkBoxes");

      for(var i=0; i< length; i++){ 
        if(date_ob < response[i].date){
            var items =  "<input class='inputdate' type='checkbox' name='datesO' checked='checked'  id="+response[i].s_id+">"+response[i].date ;
            var labell = '<label for="first" class="labelDate">' + items +'</label>';   
            sell.innerHTML += labell;
        }
         }

     }


    //  onclick to options
    $(document).on("click", "#datesOff", function(e) { 

        $('input[name=datesO]:checkbox:not(:checked)').each(function () {
            //alert($(this).attr('id'));
            var sc_id = $(this).attr('id');

            var op = 3;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_availability.php",
                dataType: 'json',//////////dr id
                data: { op: op, id: DOC_ID, s_id: sc_id},
                
                success: function (response) {
                    if (response == null)
                        console.log("wrong");
    
                    else {
                        parseDates(response);
                    }
                },
                error: function (xhr, status, errorThrown) {
                    alert(status + errorThrown);
                }
            });

            $(this).parent().remove();

        });

        document.getElementsByClassName('daysoffsuccess')[0].style.display = "block";
        $(".daysoffsuccess").fadeOut(3000);

        var checkboxes = document.getElementById("checkBoxes");
        var show=true;
    if (show)  {
        checkboxes.style.display = "none";
        //show = true;
    }
     
    });

 });

