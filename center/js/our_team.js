// JavaScript source code
$(document).ready(function() {

    OurTeam2();
    OurTeam1();

    function OurTeam2() {

        var op = 2;


        $.ajax({
            type: 'GET',
            url: "./ws/ws_our_team.php",
            data: { op: op },

            dataType: 'json',
            timeout: 5000,
            success: function(response, textStatus, xhr) {
                parseOurTeam2(response);
            },
            error: function(xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
    }
    //parse appointments today 
    function parseOurTeam2(response) {
        $("#pay_tbody").empty();
        var len = response.length;

        for (var i = 0; i < len; i++) {

            var dr_id = response[i].doctor_id;
            var dr_name = response[i].doctor_full_name;
            var dr_image = response[i].doctor_image;


            var row = " <div class='team-item' id='card_Psychologe'><div class='team-item-inner-div'>";;

            row += "<a href='./view_doctor_profile.php?doctor_id=" + dr_id + "' class='link-wraper-section'>";

            row += "  <div class='team-dr-inside-div'>";

            row += "<div class='team-content-div'>";

            row += "<div class='team-dr-image-div'>";
            row += "<img src='../images/" + dr_image + "' alt='' width='150' height='150'>";
            row += "</div>";
            row += "<p class='dr-item-title'>Dr. " + dr_name + "</p>";
            row += "</div>";
            row += "<a href='./view_doctor_profile.php?doctor_id=" + dr_id + "' class='dr-item-button'>Profile</a>";
            row += "</a>";
            row += "</div>";
            row += "</div>";



            $(".team-dr2-div").append(row);


        }


    }

    function OurTeam1() {

        var op = 1;


        $.ajax({
            type: 'GET',
            url: "./ws/ws_our_team.php",
            data: { op: op },

            dataType: 'json',
            timeout: 5000,
            success: function(response, textStatus, xhr) {
                parseOurTeam1(response)
            },
            error: function(xhr, status, errorThrown) {

                alert(status + errorThrown);
            }
        });
    }

    function parseOurTeam1(response) {
        $("#pay_tbody").empty();
        var len = response.length;

        for (var i = 0; i < len; i++) {

            var dr_id = response[i].doctor_id;
            var dr_name = response[i].doctor_full_name;
            var dr_image = response[i].doctor_image;


            var row = " <div class='team-item' id='card_Psychologe'><div class='team-item-inner-div'>";

            row += "<a href='./view_doctor_profile.php?doctor_id=" + dr_id + "' class='link-wraper-section' >";

            row += "  <div class='team-dr-inside-div'>";

            row += "<div class='team-content-div'>";

            row += "<div class='team-dr-image-div'>";
            row += "<img src='../images/" + dr_image + "' alt='' width='150' height='150'>";
            row += "</div>";
            row += "<p class='dr-item-title'>Dr. " + dr_name + "</p>";
            row += "</div>";
            row += "<a href='./view_doctor_profile.php?doctor_id=" + dr_id + "' class='dr-item-button'>Profile</a>";
            row += "</a>";
            row += "</div>";
            row += "</div>";


            $(".team-dr-div").append(row);


        }


    }

});