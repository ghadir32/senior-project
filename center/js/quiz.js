

// JavaScript source code
$(document).ready(function () {

    
    $(document).on('click', '#submit', function () {



        var q1 = $(".q1:checked").val();
        var q2 = $(".q2:checked").val();
        var q3 = $(".q3:checked").val();
        var q4 = $(".q4:checked").val();
        var q5 = $(".q5:checked").val();
        var q6 = $(".q6:checked").val();
        var q7 = $(".q7:checked").val();
        var q8 = $(".q8:checked").val();
        var q9 = $(".q9:checked").val();
        var q10 = $(".q10:checked").val();

        var depression = Number(q2) + Number(q3) + Number(q6) + Number(q7);
        var anixiety = Number(q1) + Number(q3) + Number(q10);
        var anger = Number(q8) + Number(q9);
        var adhd = Number(q4);
        var selflove = Number(q5);

        if (!$("#rdbListQues2_0").is(":checked") && !$("#rdbListQues2_1").is(":checked") && !$("#rdbListQues2_2").is(":checked") && !$("#rdbListQues2_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl01").show();
        }
        else if ($("#rdbListQues2_0").is(":checked") || $("#rdbListQues2_1").is(":checked") || $("#rdbListQues2_2").is(":checked") || $("#rdbListQues2_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl01").hide();
        }
        if (!$("#rdbListQues3_0").is(":checked") && !$("#rdbListQues3_1").is(":checked") && !$("#rdbListQues3_2").is(":checked") && !$("#rdbListQues3_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl02").show();

        }
        else if ($("#rdbListQues3_0").is(":checked") || $("#rdbListQues3_1").is(":checked") || $("#rdbListQues3_2").is(":checked") || $("#rdbListQues3_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl02").hide();
        }

        if (!$("#rdbListQues4_0").is(":checked") && !$("#rdbListQues4_1").is(":checked") && !$("#rdbListQues4_2").is(":checked") && !$("#rdbListQues4_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl03").show();

        }
        else if ($("#rdbListQues4_0").is(":checked") || $("#rdbListQues4_1").is(":checked") || $("#rdbListQues4_2").is(":checked") || $("#rdbListQues4_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl03").hide();
        }

        if (!$("#rdbListQues5_0").is(":checked") && !$("#rdbListQues5_1").is(":checked") && !$("#rdbListQues5_2").is(":checked") && !$("#rdbListQues5_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl04").show();

        }
        else if ($("#rdbListQues5_0").is(":checked") || $("#rdbListQues5_1").is(":checked") || $("#rdbListQues5_2").is(":checked") || $("#rdbListQues5_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl04").hide();
        }
        if (!$("#rdbListQues6_0").is(":checked") && !$("#rdbListQues6_1").is(":checked") && !$("#rdbListQues6_2").is(":checked") && !$("#rdbListQues6_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl05").show();

        }
        else if ($("#rdbListQues6_0").is(":checked") || $("#rdbListQues6_1").is(":checked") || $("#rdbListQues6_2").is(":checked") || $("#rdbListQues6_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl05").hide();
        }



        if (!$("#rdbListQues7_0").is(":checked") && !$("#rdbListQues7_1").is(":checked") && !$("#rdbListQues7_2").is(":checked") && !$("#rdbListQues7_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl06").show();

        }
        else if ($("#rdbListQues7_0").is(":checked") || $("#rdbListQues7_1").is(":checked") || $("#rdbListQues7_2").is(":checked") || $("#rdbListQues7_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl06").hide();
        }


        if (!$("#rdbListQues8_0").is(":checked") && !$("#rdbListQues8_1").is(":checked") && !$("#rdbListQues8_2").is(":checked") && !$("#rdbListQues8_03").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl07").show();

        }
        else if ($("#rdbListQues8_0").is(":checked") || $("#rdbListQues8_1").is(":checked") || $("#rdbListQues8_2").is(":checked") || $("#rdbListQues8_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl07").hide();
        }



        if (!$("#rdbListQues11_0").is(":checked") && !$("#rdbListQues11_1").is(":checked") && !$("#rdbListQues11_2").is(":checked") && !$("#rdbListQues11_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl8").show();

        }
        else if ($("#rdbListQues11_0").is(":checked") || $("#rdbListQues11_1").is(":checked") || $("#rdbListQues11_2").is(":checked") || $("#rdbListQues11_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl8").hide();
        }



        if (!$("#rdbListQues13_0").is(":checked") && !$("#rdbListQues13_1").is(":checked") && !$("#rdbListQues13_2").is(":checked") && !$("#rdbListQues13_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl9").show();

        }
        else if ($("#rdbListQues13_0").is(":checked") || $("#rdbListQues13_1").is(":checked") || $("#rdbListQues13_2").is(":checked") || $("#rdbListQues13_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl9").hide();
        }


        if (!$("#rdbListQues14_0").is(":checked") && !$("#rdbListQues14_1").is(":checked") && !$("#rdbListQues14_2").is(":checked") && !$("#rdbListQues14_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl10").show();

        }
        else if ($("#rdbListQues14_0").is(":checked") || $("#rdbListQues14_1").is(":checked") || $("#rdbListQues14_2").is(":checked") || $("#rdbListQues14_3").is(":checked")) {
            $("#MainContentPlaceholder_C001_ctl10").hide();
        }

        if (depression > 0 && anixiety > 0 && anger > 0 && adhd > 0 && selflove > 0) {
            testResult(depression, anixiety, anger, adhd, selflove);
            $(this).hide();
            $("#repet").show();
        }
    });
    $(document).on('click', '#repet', function () {

        window.location = "./quiz.php"

    });


    function testResult (depression, anixiety, anger, adhd, selflove) {

        if (depression < 8) {
            $("#item__result_depression").append("low & less intense depression could be your case .");
        }
        else if (depression >= 8 && depression < 12) {
            $("#item__result_depression").append("Moderate depression could be your case reach out we can help you .");
        }
        else if (depression >= 12) {
            $("#item__result_depression").append("high functioning depression that's offecting your daily life and should be treated as soon as possibly. ");
        }

        if (anixiety < 6) {
            $("#item__result_anixiety").append("you have low anxiety");
        }
        else if (anixiety >= 6 && anixiety < 10) {
            $("#item__result_anixiety").append("Your anixiety is moderate");
        }
        else if (anixiety >= 10) {
            $("#item__result_anixiety").append("high you have a high functioning excessive anxiety , means worry and Pear .");
        }


        if (anger < 4) {
            $("#item__result_anger").append("you don`t have any anger issues.");
        }
        else if (anger >= 4 && anger < 6) {
            $("#item__result_anger").append("you could struggle with anger issues.");
        }
        else if (anger >= 6) {
            $("#item__result_anger").append("your case get anger and triggered real quick.");
        }

        if (adhd < 2) {
            $("#item__result__adhd").append("you probably don`t struggle whith ADHD");
        }
        else if (adhd >= 2 && adhd < 4) {
            $("#item__result__adhd").append("you could have ADHD");
        }
        else if (adhd >= 3) {
            $("#item__result__adhd").append("you propable have high functioning ADHD");
        }

        if (selflove < 2) {
            $("#item__result_selflove").append("you have high self esteem");
        }
        else if (selflove >= 2 && selflove < 4) {
            $("#item__result_selflove").append("you may struggle with self confidence");
        }
        else if (selflove >= 3) {
            $("#item__result_selflove").append("you have high low self worth/confidence");
        }

            $(".quiz__result").show();
            $('html, body').animate({
                scrollTop: $(".quiz__result").offset().top
            }, 1000);
    }
    $(".quiz__result").hide();
    $("#repet").hide();
    $("#death").hide();


    $("#rdbListQues7_2").change(function () {
        if ($("#rdbListQues7_2").is(":checked")) {
            $("#death").show();
        }
        else {
            $("#death").hide();
        }
    });
    $("#rdbListQues7_3").change(function () {
        if ($("#rdbListQues7_3").is(":checked")) {
            $("#death").show();
        }
        else {
            $("#death").hide();
        }

    });
    $("#rdbListQues7_0").change(function () {
        $("#death").hide();
    });
    $("#rdbListQues7_1").change(function () {
        $("#death").hide();
    });
});
