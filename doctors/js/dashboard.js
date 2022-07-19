$(document).ready(function () {

    var DOC_ID;
    DOC_ID = document.getElementsByClassName("userHiddenId")[0].value; 


      //return 0 if <10 
      function pad(n) {
        return (n < 10 ? '0' : '') + n;
    }
    function dayname(dateString) {
        let day = new Date(dateString).getDay();
        let dayName;
        if (day == 0) {
            dayName = 'Sunday'
        } else if (day == 1) {
            dayName = 'Monday'
        } else if (day == 2) {
            dayName = 'Tuesday'
        } else if (day == 3) {
            dayName = 'Wednesday'
        } else if (day == 4) {
            dayName = 'Thursday'
        } else if (day == 5) {
            dayName = 'Friday'
        } else {
            dayName = 'Saturday'
        }
        return dayName;
        /*console.log(`Day : ${dayName} Month: ${month + 1} Year : ${year}`)*/
    }

    function getDateToday() {
        var date = new Date();
        var month = pad(date.getMonth() + 1);
        var day = pad(date.getDate());
        var year = date.getFullYear();
        let dateString = month + "/" + day + "/" + year;
        var namedate = dayname(dateString);
        var dateformat = day+ "/" +  month+ "/" + year;
        
        var date = namedate + " " + dateformat;
        $("#datetoday").text(date);


        var date_data = year + "-" + month + "-" + day;
        return date_data;

    }


   //total Today Appointments
   TotalTodayAppointment();
   TotalTomorrowAppointment();
   TotalLastWeekAppointment();
   TotalAppointmentTillDate();
   TotalPatients();

   function TotalTodayAppointment() {
    var Startdate = getDateToday();
    var Enddate = Startdate;
 
    var op = 1;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_dashboard.php",
            dataType: 'json',
            data: { op: op, id: DOC_ID,  Startdate: Startdate, Enddate: Enddate },
            success: function (data) {
                ParseTodayAppointments(data);
                
            },
        });

}
//parse in card today total appointments
function ParseTodayAppointments(data) {
    var len = data.length;

    for (var i = 0; i < len; i++) {
        var total = data[i].total_app;
    }
    $("#TodayAppointment").text(total);
}



    //total Tommorow Appointments
    function TotalTomorrowAppointment() {
        var date = new Date();
        var month = pad(date.getMonth() + 1);
        var day = pad(date.getDate() + 1);
        var year = date.getFullYear();

        var Startdate = year + "-" + month + "-" + day;
        var Enddate = Startdate;
        var op = 1;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_dashboard.php",
                dataType: 'json',
                data: { op: op, id:DOC_ID, Startdate: Startdate, Enddate: Enddate },
                success: function (data) {
                    ParseTomorrowAppointments(data);
                
                },

            });
    

    }
    //parse in card tommorow total appointments
    function ParseTomorrowAppointments(data) {
        var len = data.length;

        for (var i = 0; i < len; i++) {
            var total = data[i].total_app;
        }
        $("#TomorrowAppointment").text(total);
    }


     //total last week till date Appointments
     function TotalLastWeekAppointment() {
        var date = new Date();
        var month = pad(date.getMonth() + 1);
        var dayt = pad(date.getDate());
        var year = date.getFullYear();
        var dayw = pad(date.getDate()-7);
        var Startdate = year + "-" + month + "-" + dayt;
        var Enddate = year + "-" + month + "-" + dayw;

         var op = 1;
            $.ajax({
                type: 'GET',
                url: "./ws/ws_dashboard.php",
                dataType: 'json',
                data: { op: op, id:DOC_ID, Startdate: Startdate, Enddate: Enddate },
                success: function (data) {
                    ParseLastWeekAppointments(data);
                   
                },

            });

    }
     //parse in card last week till date total appointments
    function ParseLastWeekAppointments(data) {
        var len = data.length;

        
        for (var i = 0; i < len; i++) {
            var total = data[i].total_app;

        }
        $("#LastWeekAppointment").text(total);
    }


      //total till date Appointments
      function TotalAppointmentTillDate() {

        var Startdate = getDateToday();
        var Enddate = 0;

        var op = 1;

            $.ajax({
                type: 'GET',
                url: "./ws/ws_dashboard.php",
                dataType: 'json',
                data: { op: op, id:DOC_ID, Startdate: Startdate, Enddate: Enddate },
                success: function (data) {
                    ParseTotalAppointmentsTillDate(data);
                    
                },
            });

    }
     //parse in card till date total appointments
    function ParseTotalAppointmentsTillDate(data) {
        var len = data.length;

        for (var i = 0; i < len; i++) {
            var total = data[i].total_app;
        }
        $("#TotalAllAppointment").text(total);
    }


    //total patients 
    function TotalPatients() {

        var op = 2;

            $.ajax({
                type: 'GET',
                url: "./ws/ws_dashboard.php",
                dataType: 'json',
                data: { op: op, id:DOC_ID },
                success: function (data) {
                    ParseTotalPatients(data);
                    
                },
            });
    }
    //parse totoal patients
    function ParseTotalPatients(data) {
        var len = data.length;

        for (var i = 0; i < len; i++) {
            var total = data[i].total_patients;
        }
        $("#TotalPatients").text(len);
    }












/*Calendar*/
$(document).ready(function () {
    const AVAILABLE_WEEK_DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const localStorageName = 'calendar-events';

    class CALENDAR {
        constructor(options) {
            this.options = options;
            this.elements = {
                days: this.getFirstElementInsideIdByClassName('calendar-days'),
                week: this.getFirstElementInsideIdByClassName('calendar-week'),
                month: this.getFirstElementInsideIdByClassName('calendar-month'),
                year: this.getFirstElementInsideIdByClassName('calendar-current-year'),
                eventList: this.getFirstElementInsideIdByClassName('current-day-events-list'),
                eventField: this.getFirstElementInsideIdByClassName('add-event-day-field'),
                eventAddBtn: this.getFirstElementInsideIdByClassName('add-event-day-field-btn'),
                currentDay: this.getFirstElementInsideIdByClassName('calendar-left-side-day'),
                currentWeekDay: this.getFirstElementInsideIdByClassName('calendar-left-side-day-of-week'),
                prevYear: this.getFirstElementInsideIdByClassName('calendar-change-year-slider-prev'),
                nextYear: this.getFirstElementInsideIdByClassName('calendar-change-year-slider-next')
            };

            this.eventList = JSON.parse(localStorage.getItem(localStorageName)) || {};

            this.date = +new Date();
            this.options.maxDays = 37;
            this.init();
        }

        // App methods
        init() {
            if (!this.options.id) return false;
            this.eventsTrigger();
            this.drawAll();
        }

        // draw Methods
        drawAll() {
            this.drawWeekDays();
            this.drawMonths();
            this.drawDays();
            this.drawYearAndCurrentDay();
            
        }



        drawYearAndCurrentDay() {
            let calendar = this.getCalendar();
            this.elements.year.innerHTML = calendar.active.year;
            this.elements.currentDay.innerHTML = calendar.active.day;
            this.elements.currentWeekDay.innerHTML = AVAILABLE_WEEK_DAYS[calendar.active.week];
        }

        drawDays() {
            let calendar = this.getCalendar();

            let latestDaysInPrevMonth = this.range(calendar.active.startWeek).map((day, idx) => {
                return {
                    dayNumber: this.countOfDaysInMonth(calendar.pMonth) - idx,
                    month: new Date(calendar.pMonth).getMonth(),
                    year: new Date(calendar.pMonth).getFullYear(),
                    currentMonth: false
                }
            }).reverse();


            let daysInActiveMonth = this.range(calendar.active.days).map((day, idx) => {
                let dayNumber = idx + 1;
                let today = new Date();
                return {
                    dayNumber,
                    today: today.getDate() === dayNumber && today.getFullYear() === calendar.active.year && today.getMonth() === calendar.active.month,
                    month: calendar.active.month,
                    year: calendar.active.year,
                    selected: calendar.active.day === dayNumber,
                    currentMonth: true
                }
            });


            let countOfDays = this.options.maxDays - (latestDaysInPrevMonth.length + daysInActiveMonth.length);
            let daysInNextMonth = this.range(countOfDays).map((day, idx) => {
                return {
                    dayNumber: idx + 1,
                    month: new Date(calendar.nMonth).getMonth(),
                    year: new Date(calendar.nMonth).getFullYear(),
                    currentMonth: false
                }
            });

            let days = [...latestDaysInPrevMonth, ...daysInActiveMonth, ...daysInNextMonth];

            days = days.map(day => {
                let newDayParams = day;
                let formatted = this.getFormattedDate(new Date(`${Number(day.month) + 1}/${day.dayNumber}/${day.year}`));
                newDayParams.hasEvent = this.eventList[formatted];
                return newDayParams;
            });
            
            let daysTemplate = "";
            days.forEach(day => {

                daysTemplate += `<li class="${day.currentMonth ? '' : 'another-month'}${day.today ? ' active-day ' : ''}${day.selected ? 'selected-day' : ''}"  data-day="${day.dayNumber}" data-month="${day.month}" data-year="${day.year}"></li>`
            });

            this.elements.days.innerHTML = daysTemplate;
        }
        

        drawMonths() {
            let availableMonths = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            let monthTemplate = "";
            let calendar = this.getCalendar();
            availableMonths.forEach((month, idx) => {
                    monthTemplate += `<li class="${idx === calendar.active.month ? 'active' : ''}" data-month="${idx}">${month}</li>`
              
            });

            this.elements.month.innerHTML = monthTemplate;
        }

        drawWeekDays() {
            let weekTemplate = "";
            AVAILABLE_WEEK_DAYS.forEach(week => {
                weekTemplate += `<li>${week.slice(0, 3)}</li>`
            });

            this.elements.week.innerHTML = weekTemplate;
        }

        // Service methods
        eventsTrigger() {
            this.elements.prevYear.addEventListener('click', e => {
                let calendar = this.getCalendar();
                this.updateTime(calendar.pYear);
                this.drawAll()
            });

            this.elements.nextYear.addEventListener('click', e => {
                let calendar = this.getCalendar();
                this.updateTime(calendar.nYear);
                this.drawAll()
            });

            this.elements.month.addEventListener('click', e => {
                let calendar = this.getCalendar();
                let month = e.srcElement.getAttribute('data-month');
                if (!month || calendar.active.month == month) return false;

                let newMonth = new Date(calendar.active.tm).setMonth(month);
                this.updateTime(newMonth);
                this.drawAll()
            });


            this.elements.days.addEventListener('click', e => {
                let element = e.srcElement;
                let day = element.getAttribute('data-day');
                let month = element.getAttribute('data-month');
                let year = element.getAttribute('data-year');
                if (!day) return false;
                let strDate = `${Number(month) + 1}/${day}/${year}`;
                this.updateTime(strDate);
                this.drawAll()
            });
        }


        updateTime(time) {
            this.date = +new Date(time);
        }

        getCalendar() {
            let time = new Date(this.date);

            return {
                active: {
                    days: this.countOfDaysInMonth(time),
                    startWeek: this.getStartedDayOfWeekByTime(time),
                    day: time.getDate(),
                    week: time.getDay(),
                    month: time.getMonth(),
                    year: time.getFullYear(),
                    formatted: this.getFormattedDate(time),
                    tm: +time
                },
                pMonth: new Date(time.getFullYear(), time.getMonth() - 1, 1),
                nMonth: new Date(time.getFullYear(), time.getMonth() + 1, 1),
                pYear: new Date(new Date(time).getFullYear() - 1, 0, 1),
                nYear: new Date(new Date(time).getFullYear() + 1, 0, 1)
            }
        }

        countOfDaysInMonth(time) {
            let date = this.getMonthAndYear(time);
            return new Date(date.year, date.month + 1, 0).getDate();
        }

        getStartedDayOfWeekByTime(time) {
            let date = this.getMonthAndYear(time);
            return new Date(date.year, date.month, 1).getDay();
        }

        getMonthAndYear(time) {
            let date = new Date(time);
            return {
                year: date.getFullYear(),
                month: date.getMonth()
            }
        }

        getFormattedDate(date) {
            return `${date.getDate()}/${date.getMonth()}/${date.getFullYear()}`;
        }

        range(number) {
            return new Array(number).fill().map((e, i) => i);
        }

        getFirstElementInsideIdByClassName(className) {
            return document.getElementById(this.options.id).getElementsByClassName(className)[0];
        }
    }


    (function () {
        new CALENDAR({
            id: "calendar"
        })
    })();
});



 
    $(document).on('click', '#but', function () {
        var day = $('.selected-day').attr("data-day");
        var month = $('.selected-day').attr("data-month");
        var year = $('.selected-day').attr("data-year");
        month = +month + 1;
        var date = year + "-" + month + "-" + day;
        var patientsUl = document.querySelector(".patients-links");
        $('.patients-links').empty();
        $('.patients-links')[0].setAttribute("style", "z-index:11111;");
        // style('z-index',"11111");
        // window.location.href = "./admin_appointments.php?date=" + date;
        //alert(date );
        var op = 3;
        // var id = 2;/////MANUAL ID
        $.ajax({
            type: 'GET',
            url: "./ws/ws_dashboard.php",
            dataType: 'json',///////doc id
            data: { op: op, id: DOC_ID, date:date},
            
            success: function (response) {
                if (response == -1)
                  alert("Data couldn't be loaded!");    
                  else {
                   parsePatients(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });


        function parsePatients(response) {
            if(response == null){
                $(".noSessionTxt").fadeIn(1000);
                $(".noSessionTxt").fadeOut(3000);
                document.getElementsByClassName("patients-links")[0].hide();

            }else{

            var len = response.length;
            var patientsUl = document.querySelector(".patients-links");
           // patientsUl.clear();

         

            for(var i=0; i<len; i++){
               // alert(response[i].patients);
               var Pid = response[i].patient_id;
               var patient_name = response[i].patients;
               var name = patient_name.charAt(0).toUpperCase() + patient_name.slice(1);

                var Pli= '<li class="liPatients" id='+Pid+'  > <a href="Dr_patients.php?patient_id='+Pid+' "> '+  name+'</a>  </li> ';
                patientsUl.innerHTML += Pli; 

            }

        }
     
        document.getElementsByClassName("patients-links")[0].style.display="block";
        document.getElementsByClassName("side_arrow")[0].style.display="block";

    }


    document.addEventListener('mouseup', function(ev) {
        let v = ev.target;
        var vv =  document.getElementsByClassName("patients-links")[0];
        if(!vv.contains(ev.target) && 
        $('#ulp').is(":visible")){
        
            document.getElementsByClassName("patients-links")[0].style.display="none";
            document.getElementsByClassName("side_arrow")[0].style.display="none";

        } 
     
    });

    
 

    });


});