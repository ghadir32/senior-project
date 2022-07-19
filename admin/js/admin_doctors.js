

$(document).ready(function () {

 
    ActiveDoctors();
    InactiveDoctors();

    function ActiveDoctors() {
        $(".empty").hide();
        var op = 0;
        //request to get data

        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_doctors.php",
            data: { op: op},

            dataType: 'json',
            timeout: 5000,
            success: function (response, textStatus, xhr) {

                if (!response) {
                   
                    $(".empty").show();
                    $("#app_tbody").empty();
                }
                else {

                    data = JSON.parse(xhr.responseText);
                    parseActiveDoctors(response);
                  
                    $(".empty").hide();
                }
            },
            error: function (xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
    }
    //parse appointments today 
    function parseActiveDoctors(response) {
        $("#app_tbody").empty();
        var len = response.length;
        
        for (var i = 0; i < len; i++) {

            var doctor_id = response[i].doctor_id;
            var first_name = response[i].first_name;
            var last_name = response[i].last_name;
            var dr_type = response[i].dr_type;
            var Phone_number = response[i].Phone_number;
            var specialist = response[i].spec_name;
            var proffessional_statments = response[i].proffessional_statments;
            var job_title = response[i].job_title;
            var about_yourself = response[i].about_yourself;
            var education = response[i].education;
            var work_experience = response[i].work_experience;
            var user_id = response[i].user_id;

            var dr_image = response[i].doctor_image;

            var row = '<div class="card"><table class="cardTable"><tbody><tr>';
            row += '<td class="td1"><div class="drProfilePic1"><img src="../images/' + dr_image+'" class="drProfilePic"><div class="button"><a name="'+user_id+'" id="deactivateBtn" href="#"> Diactivate </a></div></div></td>';
            row += '<td><div class="drCardName2"><a href="../doctors/view_doctor_profile.php?doctor_id=' + doctor_id + '" data-replace="Go To Profile"><span>'+first_name.toUpperCase() +' '+ last_name.toUpperCase()+ '</span></a><br>'+dr_type+ ' </div>';


            $("#app_tbody").append(row);
            
        }
        
        
    }
    

   // search in table
    $("#insearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();

        $("#app_tbody div tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      
        });
        


    });

    
    //alert
	$("#app_tbody").on("click","#deactivateBtn", function(){// Deactivate btn inside the card
		if (confirm("Are you sure you want to deactivate the user?"))
		var id=$(this).attr("name");
		 deactivateUser(id);
			
	});

    function deactivateUser(userID) 
	{  
	$.ajax({
		type:'GET',
		url: "./ws/ws_admin_doctors.php",
		data:({op:2,id:userID}),
  
		dataType:'json',
		timeout:5000,
		success: function(data, textStatus, xhr)
		{
		  if(data==-1){
			alert("Data Couldn't be Loaded");
		  }
		  else if (data==1){
			InactiveDoctors();
            ActiveDoctors();
		  }
		},
		error:function(xhr,status,errorThrown)
		{
		}
  
	});
	}





  

    function InactiveDoctors() {
        $(".empty1").hide();
        var op = 3;
        //request to get data

        $.ajax({
            type: 'GET',
            url: "./ws/ws_admin_doctors.php",
            data: { op: op,  },

            dataType: 'json',
            timeout: 5000,
            success: function (response, textStatus, xhr) {

                if (!response) {
                   
                    $(".empty1").show();
                    $("#app_tbody_inactive").empty();
                }
                else {

                    data = JSON.parse(xhr.responseText);
                    parseInactiveDoctors(response);
                  
                    $(".empty1").hide();
                }
            },
            error: function (xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
    }
    //parse appointments today 
    function parseInactiveDoctors(response) {
        $("#app_tbody_inactive").empty();
        var len = response.length;
        
        for (var i = 0; i < len; i++) {

            var doctor_id = response[i].doctor_id;
            var first_name = response[i].first_name;
            var last_name = response[i].last_name;
            var dr_type = response[i].dr_type;
            var Phone_number = response[i].Phone_number;
            var specialist = response[i].spec_name;
            var proffessional_statments = response[i].proffessional_statments;
            var job_title = response[i].job_title;
            var about_yourself = response[i].about_yourself;
            var education = response[i].education;
            var work_experience = response[i].work_experience;
            var user_id = response[i].user_id;

            var dr_image = response[i].doctor_image;

            var row = '<div class="card"><table class="cardTable"><tbody><tr>';
            row += '<td class="td1"><div class="drProfilePic1"><img src="../images/' + dr_image + '" class="drProfilePic"><div class="diactivatedDiv">Deactivated</div><div class="button"><a name="' + user_id + '" id="reactivateBtn" href="#"> Reactivate </a></div></div></td>';
            row += '<td><div class="drCardName2"><a href="../doctors/view_doctor_profile.php?doctor_id=' + doctor_id + '" data-replace="Go To Profile"><span>'+first_name.toUpperCase() +' '+ last_name.toUpperCase()+ '</span></a><br>'+dr_type+ ' </div>';

            
            $("#app_tbody_inactive").append(row);
            
        }
        
        
    }
     //alert
	$("#app_tbody_inactive").on("click","#reactivateBtn", function(){// Reactivate btn inside the card
		if (confirm("Are you sure you want to Reactivate the user?"))
		var id=$(this).attr("name");
		 reactivateUser(id);
			
	});

    function reactivateUser(userID) 
	{  
	$.ajax({
		type:'GET',
		url: "./ws/ws_admin_doctors.php",
		data:({op:4,id:userID}),
  
		dataType:'json',
		timeout:5000,
		success: function(data, textStatus, xhr)
		{
		  if(data==-1){
			alert("Data Couldn't be Loaded");
		  }
		  else if (data==1){
            InactiveDoctors();
            ActiveDoctors();
		  }
		},
		error:function(xhr,status,errorThrown)
		{
		}
  
	});
	}


   // search in table
    $("#insearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();

        $("#app_tbody div tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      
        });
        


    });


	var myModal = $('#addDrbtn').jBox('Modal');
 
    myModal.setTitle('Add Doctor').setContent($('#addDr'));

	

//Modal submit(add) button on click ;it displays the modal to add a new dr
$("#add").click(function(){
	
    valid=validateFields();
    
    if(valid)
    {
        var name=$("#name").val();
        var lName=$("#lName").val();
        var uName=$("#uName").val();
        var uPass=$("#uPass").val();
        var drType=$("#drType").val();
			if(drType=="doctor")
			drType=1
			else if(drType=="psychotherapist")
			drType=2
        addDr(name,lName,uName,uPass,drType);
        resetFields();
        ActiveDoctors();
        
    }
    else
    alert("Fill all the rows")
    
});




//it resets the fields once the modal is closed
function resetFields()
{		
    $("#name").val("");
    $("#lName").val("");
    $("#uName").val("");
    $("#uPass").val("");
}

//it validate if any of the fields are empty in the modal 
function validateFields(){
    
    var resultn= $("#name").val()!="" ?true:false;
    var resultf= $("#lName").val()!="" ?true:false;
    var resulte= $("#uName").val()!="" ?true:false;
    var resultb= $("#uPass").val()!="" ?true:false;
    var resultc= $("#drType").val()!="" ?true:false;
    
    return resultn && resultf && resulte &&resultb && resultc;
}

function addDr(drName,drLName,drUname,drPwd,drType) 
{  
$.ajax({
    type:'GET',
    url: "./ws/ws_admin_doctors.php",
    data:({op:5,uName:drUname,uPass:drPwd}),

    dataType:'json',
    timeout:5000,
    success: function(data, textStatus, xhr)
    {
      if(data==-1)
      alert("data couldn't be loaded");
      else{
        if(data=="Doctor's username already exists")
        alert("Doctor username already exists");
        else{
            getLastUId(drName,drLName,drType)
           
        }
      //  data=JSON.parse(xhr.responseText);
     //   populateUsers(data);
      }
    },
    error:function(xhr,status,errorThrown)
    {
      alert(status + errorThrown);
    }

});
}
function getLastUId(name,lname,drType) 
{  
    var op = 6;
    //request to get data

    $.ajax({
        type: 'GET',
        url: "./ws/ws_admin_doctors.php",
        data: { op: op,  },

        dataType: 'json',
        timeout: 5000,
        success: function (response, textStatus, xhr) {

            if (!response) {
               
            }
            else {

                data = JSON.parse(xhr.responseText);
                var last_user_id = response[0].user_id;
                parseLastId(last_user_id,name,lname,drType);
            }
        },
        error: function (xhr, status, errorThrown) {

            alert(status + errorThrown);
        }
    });
}

function parseLastId(lUid,fName,lName,drType) {
 

       
        addDrToDrsTable(fName,lName,drType,lUid);

    
}

function addDrToDrsTable(drName,drLName,drtype,lastUId){
    $.ajax({
        type:'GET',
        url: "./ws/ws_admin_doctors.php",
        data:({op:7,name:drName,lName:drLName,type:drtype,lastUserId:lastUId}),
        dataType:'json',
        timeout:5000,
        success: function(data, textStatus, xhr)
        {
          if(data==-1)
          alert("data couldn't be loaded");
          else{
           ActiveDoctors();
          //  data=JSON.parse(xhr.responseText);
         //   populateUsers(data);
          }
        },
        error:function(xhr,status,errorThrown)
        {
          alert(status + errorThrown);
        }
    
    });
}



});

