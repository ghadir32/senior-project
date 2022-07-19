$(document).ready(function () {

    var val = document.getElementsByClassName("userHiddenId")[0].value; 
    var img = document.getElementById("profile"); 
    // var dr_image = document.getElementById("dr_image"); 

    
    getDrImage();
    function getDrImage() {
        var op = 5;
        $.ajax({
            type: 'GET',
            url: "./ws/ws_settings.php",
            dataType: 'json',
            data: { op: op, id:val},
            success: function (response) {
                if (response == -1)
                    alert("Data couldn't be loaded!");
                else {
                    parseImage(response);
                }
            },
        });
    }



    //get values and put it in product table////////////////
    function parseImage(response) {
   
            img.src= "../images/" + response[0].doctor_image;
            // dr_image.src= "../../../images/" + response[0].doctor_image;

        }
    



});