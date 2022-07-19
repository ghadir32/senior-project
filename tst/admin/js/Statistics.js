// JavaScript Document
$(document).ready(function(){
	
     GetSaledItems();
	
	
	GetSaledcat();
	
	
	
	
	GetSaledPerDate();
	
	// parse quantity of solded Cat
	
	function parsecat(data)
	{
		var xValues=new Array(); 
        var yValues=new Array();
		
		  	var barColors = ["red", "green","blue","orange","brown"];

		
		 $.each(data, function(index, row) {
		//	alert(row.product_name);
			 xValues.push(row.cat_name);
			 yValues.push(row.quantity);
			 var maxvalue = Math.max(yValues);
			 var minvalue = Math.min(yValues);
		new Chart("myChart", {
             type: "bar",
             data: {
                    labels: xValues,
						 	   
                    datasets: [{
                       backgroundColor: barColors,
                       data: yValues
                     }]
                    },
			options: {
				scales: {
					yAxes: [{ ticks: { min:10 } }],
				},
			   legend: { display: false },

                   title: {
                           display: true,
					       fontSize: 30,
					       fontColor: "grey",
                            text: "Categories quantity Sold"
					         
				}

                       }
                    });
			 
		     });						
	}
	
		
	            
	
	// parse quantity of sold items
	
	function parsevalues(data)
	{	
		
		var xValues=new Array(); 
    var yValues=new Array();
		 var pieColors = ["#b91d47", "#00aba9", "#2b5797",  "#e8c3b9",  "#1e7145" , "red", "green","blue","orange","brown"];
	
		
		 $.each(data, function(index, row) {
		//	alert(row.product_name);
			 xValues.push(row.product_name);
			 yValues.push(row.Quantity);
			 
			 
			 new Chart("myPieChart", {
               type: "pie",
               data: {
                    labels: xValues,
                    datasets: [{
                    backgroundColor: pieColors,
                    data: yValues
                    }]
                      },
             options: {
                     title: {
                      display: true,
						  fontSize: 30,
					       fontColor: "grey",
                       text: "The Most 4 Items Sold"
                            }
                         }
                     });
	                     });
		
	            }
			 
			 
	
	function GetSaledItems()
	{
		var op = 1;
		$.ajax({
			type:'Get',
			url: "./ws/ws_Statistics.php",
			 data: ({
				  
			        op: op,				 
				}),
			  dataType: 'json',
			  timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else
		   {
			  
					 parsevalues(data);
				 //   data = JSON.parse(xhr.responseText);							
				  }
			  },			
		});
	}
	
	
	function GetSaledcat()
	{
		var op = 2;
		$.ajax({
			type:'Get',
			url: "./ws/ws_Statistics.php",
			 data: ({
				  
			        op: op,				 
				}),
			  dataType: 'json',
			  timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else
		   {
			  
					 parsecat(data);
				 //   data = JSON.parse(xhr.responseText);							
				  }
			  },			
		});
	}
	
	// parse of total price of sold per date 
	
	function parseDateValues(data)
	{	
		
		var xValues=new Array(); 
       var yValues=new Array();
		// var pieColors = ["#b91d47", "#00aba9", "#2b5797",  "#e8c3b9",  "#1e7145" , "red", "green","blue","orange","brown"];
	
		
		 $.each(data, function(index, row) {
		//	alert(row.product_name);
			 xValues.push(row.Date);
			 yValues.push(row.Total_Income);
			 
			 
			new Chart("linechart", {
                type: "line",
                data: {
                     labels: xValues,
                     datasets: [{
                     fill: false,
                     lineTension: 0,
                     backgroundColor: "rgba(0,0,255,1.0)",
                     borderColor: "rgba(0,0,255,0.1)",
                     data: yValues
                      }]
                      },
                  options: {
                  legend: {display: false},
                  scales: {
                       yAxes: [{ticks: {min: 100, max:10000}}],
                      },
				 
                  title: {
                      display: true,
					  fontSize: 20,
					  padding: 20 ,
					  fontColor: "grey",
					  text: "Price of Sold Items Per Day"
                            }
                         }	  
					 
                   });
	            });
	}
	
	function GetSaledPerDate()
	{
		var op = 3;
		$.ajax({
			type:'Get',
			url: "./ws/ws_Statistics.php",
			 data: ({
				  
			        op: op,				 
				}),
			  dataType: 'json',
			  timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else
		   {
			  
					 parseDateValues(data);
				 //   data = JSON.parse(xhr.responseText);							
				  }
			  },			
		});
	}
	

	
	



});