// JavaScript Document
$(document).ready(function(){
	

	getCategories();
		
		$("#txtSearch").show();
		$("#txtSearch").keyup(function(){
			
			var value = $(this).val().toLowerCase();
			$("#categoriestbody  tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			
           });
	    });
	
	$('#selected').on('change', function() {
	var Display;
	Display = $("#selected").val();
	if (Display == "Display All")
		{
	      getCategories();
		}
	
	else if (Display == "Activated Categories")
		{
			GetD_or_ACat(1);
		}
	else if (Display == "Deactivated Categories")
		{
			GetD_or_ACat(0);
		}
	});
	
	function GetD_or_ACat(status)
	{
		var	op = 5 ;
		  
		$.ajax({
			  type: 'GET',
			  url: "./ws/ws_Admin_Categories.php",
			  data: ({status:status,
					 op:op}),
			  
			  dataType: 'json',
			  timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
		  		 
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else{
					 
				    data = JSON.parse(xhr.responseText);					
					
					  parseCat(data);
				
				  }
			  },
			  error: function(xhr, status, errorThrown) 
			  {
				 			  
				  alert(status + errorThrown);				  
			  }
		  });  	

	}
	
	
	function getCategories(name)
	{		
		var	op = 1 ;
		  
		$.ajax({
			  type: 'GET',
			  url:"./ws/ws_Admin_Categories.php",
			  data: ({name:name,
					 op:op}),
			  
			  dataType: 'json',
			  timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
		  		 
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else{
					 
				    data = JSON.parse(xhr.responseText);					
					  
					    
					  parseCat(data);
				
				  }
			  },
			  error: function(xhr, status, errorThrown) 
			  {
				 			  
				  alert(status + errorThrown);				  
			  }
		  });  	

	}
	function statusimage(status)
	{
		if(status==1)
		{
		 return	"<i class='fas fa-thumbs-up'></i>" 
		}
		else
		{
		return	"<i class='fas fa-thumbs-down'></i>"
		}
	}
	
	function parseCat(data)
	{
	  	 
		
		$("#categoriestbody").empty();
		
		 $.each(data, function(index, row) {			   
			 			   
			  item="<tr id='tr_"+row.cat_id+"'>";
			  item+="<td class='edit' data-image='"+row.cat_image+"'><img src='../img/"+row.cat_image+"'></td>";
			  item+="<td class='edit' data-cname='"+row.cat_name+"' >"+row.cat_name+"</td>";
			  item+="<td id='Sstatus' class='edit' data-status='"+row.cat_status+"' >"+statusimage(row.cat_status)+"</td>"
			  item+="<td id='action'><button class='actionbtn btn' data-bs-toggle='modal' data-bs-target='#myModal' id='EDI_"+row.cat_id+"' ><i class='fas fa-edit'></i></button> <button class='btn' data-bs-toggle='modal' data-bs-target='#myModaldelete'   ><i class='fas fa-trash' id='DEL_"+row.cat_id+"' ></i></button><button id ='Act_"+row.cat_id+"'  class='activate btn'  ><i class='far fa-check-circle' ></i> </td>";
			  item+="</tr>";		
			   			 
			 
			
			 
			 
			 $("#categoriestbody").append(item);			   			   
			   
			   
			});		
	}
	
	
	// Edit Data
	var res ;
	$(document).on('click','[id^="EDI_"]',function(){
        $("#OK").hide();
		$("#SUBEDI").show();
		
		$("#CANEDI").show();
		
		$("#Setheader").text("Edit Category");
		
        var itmId = this.id;
        res = itmId.replace("EDI_", "");
         
       
   	  
		var image=$(this).parents("tr").find("td:eq(0)").attr("data-image");
		var name=$(this).parents("tr").find("td:eq(1)").attr("data-cname");
		
  
     	
		
		$("#editimage").attr("value",""+image);
		$("#editname").attr("value",""+name);
 
		
															
	    $(document).on('click', '#SUBEDI', function() {
		     var Eimg=$("#chooseimage").val();
			 if(Eimg=="")			 
			 {
			 var Eimage=$("#editimage").val();	 
			 $("#editimage").attr("value",""+Eimage);	 		 
			 }
			
			 else
			 {				 
			 var  val = Eimg.substring(12, Eimg.length);
			// var image = (Eimg);
			 $("#editimage").attr("value",""+val);			 
			 }
			
			 var Eimage=$("#editimage").val();
			 var EMname=$("#editname").val();
	//	     var Estatus = $("#editstatus").val();
			 
            
			 $(this).parents("tr").find("td:eq(0)").text(Eimage);  
			 $(this).parents("tr").find("td:eq(1)").text(EMname);			 
	//		 $(this).parents("tr").find("td:eq(2)").text(Estatus);
			
			   
		     
	     	 var eimage=$(this).parents("tr").attr("eimage",Eimage);
			 var uname=$(this).parents("tr").attr("uname",EMname);
	//		 var stat=$(this).parents("tr").attr("stat",Estatus);
		
		     EditData(res,Eimage,EMname)//,Estatus);
		 
		   });	
	});
	
	
	 function EditData(rowid,image,name)//,status)
	   {	
		   var	op = 3 ;   
		  $.ajax({	  
			  type: 'GET',
			  url: "./ws/ws_Admin_Categories.php",
			  data: ({
				    rowid:rowid,
			        op: op,
				    image:image, 
				    name: name,
			//		status: status				
				}),
			   dataType: 'json',
			   timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
		  		 
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else
				  {
					 
				
				  }
			  },
			
		  });  	
		
		}
	
	//ADD NEW
	
	 $(document).on('click', '#ADD', function(){
		 
		
		  	 	 
		$("#OK").show();
		$("#SUBEDI").hide();		 
		$("#CANEDI").hide();		 
		$("#Setheader").text("Add New Category");
		
	     $(document).on('click', '#OK', function()  {
	       
		     var image=$("#chooseimage").val();  
			
		  	 var  res = image.substring(12, image.length);
		
			 var name=$("#editname").val();

		if( name!="" || status!="" || image!="" )
		{ 
			 AddNewData(res,name,1);
			
		}
	    else
		{
			alert("Please fill in all importent information");	
	    }
		 });
	
		 
	 });
         
	   function AddNewData(image,name,status)
	   {	
		   var	op = 2 ;	   
		   
		   $.ajax({
			  
			  type: 'GET',
			  url: "./ws/ws_Admin_Categories.php",
			  data: ({
			        op: op,
				    image:image,
				    cname: name,
					cstatus: status				
				}),
			   dataType: 'json',
			   timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
		  		 
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else
				  {
					 location.reload();
				
				  }
			  },
			
		  });  	
		
		}
		
	
	
	
	
	  
	
	    
     	var del ;
		$(document).on('click','[id^="DEL_"]',function(){
				
			  var itmId = this.id;
			
             del = itmId.replace("DEL_","");
			 var status=$(this).parents("tr").find("td:eq(2)").attr("data-status");
			var catname = $(this).parents("tr").find("td:eq(1)").attr("data-cname");
			
		
			
			
			$("#deactivate_category").click(function(){
				
		  if(status==0)
			 {
				 alert("Category already deactivated");
			 }
		  else
			 {	
				 D_ActivateCat(del,0)
                //  deactivateCat(del);		
				  location.reload();
			 }
		});
			
		$(document).on('click','#delete_category',function(){
	
			
		
	//	alert(catname);
	//		if(CheckBeforeDelete(catname)==0)
	//		 {
	//			alert("You can't delete cat");
	//		 }
	//	 else
		//	{
				  deleteCat(del);	
			
	              $(this).remove();
			       
		          location.reload();	 
		  
				
		//	}
		
			
			
	       
		});
				});
			
	
	    
	
	
	
		function deleteCat(id)
	{
		
	
		  var	op = 6 ;   
		  $.ajax({	  
			  type: 'GET',
			  url: "./ws/ws_Admin_Categories.php",
			  data: ({
				    rowid:id,
			        op: op,
				    
				}),
			   dataType: 'json',
			   timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
		  		 
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else{
					 
				    data = JSON.parse(xhr.responseText);							
				  }
			  },
			 
		  });  	
	}
	
	var res ;
	$(document).on('click','[id^="Act_"]',function(){
        
		
        var itmId = this.id;
        res = itmId.replace("Act_", "");
	
	
		
		 D_ActivateCat(res,1)
                //  deactivateCat(del);		
		 location.reload();
		
	});
	
	
	
	function D_ActivateCat(id,dstatus)
	{
		  var	op = 4 ;   
		  $.ajax({	  
			  type: 'GET',
			  url: "./ws/ws_Admin_Categories.php",
			  data: ({
				    rowid:id,
			        op: op,
				    dstatus: dstatus
				}),
			   dataType: 'json',
			   timeout: 5000,
			  success: function(data, textStatus, xhr) 
			  {				  
		  		 
				  if(data==-1)
					  alert("Data couldn't be loaded!");
				  else{
					 
				    data = JSON.parse(xhr.responseText);							
				  }
			  },
			 
		  });  	
	}
	function CheckBeforeDelete(catname)
	{
		var op = 7;
		$.ajax({
			type:'Get',
			url: "./ws/ws_Admin_Categories.php",
			 data: ({
				    catname:catname,
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
					 
				 //   data = JSON.parse(xhr.responseText);							
				  }
			  },			
		});
	}

	
 

});