
$(document).ready(function () {





    GetMonthlyDotalSoctorApp();
    GetMonthlyProfit();
    GetMostMonthOfApp();


    function GetMonthlyDotalSoctorApp() {
        var date = new Date();
        var month = date.getMonth()+1;
        var year = date.getFullYear();




        var op = 1;
        
       
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_statistics.php",
            dataType: 'json',
            data: { op: op, month: month, year: year },

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseBarChart(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
    function parseBarChart(response) {
        var len = response.length;
        var xValues = [];
        var yValues = [];
         

        for (var i = 0; i < len; i++) {

            var total_dr_app = response[i].total_dr_app;
            var doctor_name = response[i].doctor_full_name;

            xValues[i] = doctor_name;
            yValues[i] = total_dr_app;
            var ctxB = document.getElementById("barChart").getContext('2d');

            
        }
        var myBarChart = new Chart(ctxB, {


            type: 'bar',
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Total Appointments',
                    data: yValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                tooltips: { enabeled: false },
                hover: { mode: null },
                showTooltips: false,
                scales: {


                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: { display: false },

                title: {
                    display: true,
                    fontSize: 24,
                    fontColor: "grey",
                    text: "Top 5 Busiest Doctors"

                },

            },


        
        });

    }



    function GetMonthlyProfit() {
        var date = new Date();
        var year = date.getFullYear();
        var op = 2;

        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_statistics.php",
            dataType: 'json',
            data: { op: op ,year: year },

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseLineChart(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
    function parseLineChart(response) {
        var len = response.length;
        
        var yValues = [];


        for (var i = 0; i < len; i++) {

            var totalSum = response[i].totalSum;
            var month = response[i].thismonth;
            yValues[month-1] = totalSum;
           
        }
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: "Total Profit",
                    data: yValues,

                    borderWidth: 1
                },
                ]
            },
            options: {
               
                responsive: true,
                legend: { display: false },

                title: {
                    display: true,
                    fontSize: 24,
                    fontColor: "grey",
                    text: "Monthly Profit"

                },
                
            }
        });


    }



   

    function GetMostMonthOfApp() {
        var date = new Date();
        var year = date.getFullYear();
        var op = 3;
   
        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_statistics.php",
            dataType: 'json',
            data: { op: op, year: year },

            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parsepieChart(response);
                }
            },
            error: function (xhr, status, errorThrown) {
                alert(status + errorThrown);
            }
        });
    }
    function parsepieChart(response) {
        var len = response.length;

        var yValues = [];
        var xvalues = [];
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];


        for (var i = 0; i < len; i++) {

            var totalSum = response[i].totalSum;
            var month = response[i].thismonth - 1;
            yValues[i] = totalSum;
            xvalues[i] = [months[month]]
        }
        //pie
        var ctxP = document.getElementById("PieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
                labels: xvalues,
                datasets: [{
                    data: yValues,
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#F22A5E", "#5753D1", "#00C870", "#A756C5"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5"]
                }]
            },
            options: {
                responsive: true,
                legend: { display: false },

                title: {
                    display: true,
                    fontSize: 24,
                    fontColor: "grey",
                    text: "Months With The Appointments"

                },
            }
        });


    }


    $(document).on('click', '#print', function () {
     
        window.print();
      

    });
    $(document).on('click', '#logout', function () {

        var op = 3;
        $.ajax({
            type: 'GET',
            url: "../login_register/ws/users_ws.php",
            dataType: 'json',
            data: { op: op },
            success: function (response) {
                window.location.href = "../login_register/login.php";
            },
        });

    });
});
