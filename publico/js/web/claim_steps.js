var repre = true;

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validate1(val) {
    v1 = document.getElementById("NAME");
    v2 = document.getElementById("FLASTNAME");
    v3 = document.getElementById("MLASTNAME");
    v4 = document.getElementById("NUMIDENTITY");
    v5 = document.getElementById("EMAIL");
    v6 = document.getElementById("PHONE");

    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;
    flag6 = true;

    flag = true;
    return flag;
}

function validate2(val) {
    v1 = document.getElementById("R_NAME");
    v2 = document.getElementById("R_FLASTNAME");
    v3 = document.getElementById("R_MLASTNAME");
    v4 = document.getElementById("R_EMAIL");
    v5 = document.getElementById("R_PHONE");

    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;

    flag = true;
    return flag;
}

function validate3(val) {
    v1 = document.getElementById("CLAIMDESC");
    v2 = document.getElementById("ORDERCLAIM");
    v3 = document.getElementById("complain");

    flag1 = true;
    flag2 = true;
    flag3 = true;

    flag = true;
    return flag;
}

function validate4(val) {
    v1 = document.getElementById("priece");
    v2 = document.getElementById("file");
    v3 = document.getElementById("desc");
    inla = document.getElementById("fileText");

    flag1 = true;
    flag2 = true;
    flag3 = true;

    flag = true;
    return flag;
}



$(document).ready(function() {

    var current_fs, next_fs, previous_fs;

    $(".next").click(function() {

        str1 = "next1";
        str2 = "next2";
        str3 = "next3";

        val1 = true;
        val2 = true;
        val3 = true;

        if ((!str1.localeCompare($(this).attr('id')) && val1 == true) || (!str2.localeCompare($(this).attr('id')) && val2 == true) || (!str3.localeCompare($(this).attr('id')) && val3 == true)) {
            current_fs = $(this).parent().parent();
            next_fs = $(this).parent().parent().next();

            $(current_fs).removeClass("show");
            $(next_fs).addClass("show");

            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            current_fs.animate({}, {
                step: function() {

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });

                    next_fs.css({
                        'display': 'block'
                    });
                }
            });
        }
    });

    $(".prev").click(function() {
        current_fs = $(this).parent().parent();
        previous_fs = $(this).parent().parent().prev();

        $(current_fs).removeClass("show");
        $(previous_fs).addClass("show");

        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        current_fs.animate({}, {
            step: function() {

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });

                previous_fs.css({
                    'display': 'block'
                });
            }
        });
    });
    $(".ant").click(function() {
        current_fs = $(this).parent().parent();
        previous_fs = $(this).parent().parent().prev();

        $(current_fs).removeClass("show");
        $(previous_fs).addClass("show");

        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        current_fs.animate({}, {
            step: function() {

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });

                previous_fs.css({
                    'display': 'block'
                });
            }
        });
    });
});