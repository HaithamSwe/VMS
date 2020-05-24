


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

$(document).ready(function () {
    
    $("#National_ID").keyup(function () {

        var patt = new RegExp("(?<!\d)\d{10}(?!\d)");
        var res = patt.test($(this).val());
        if (/^\d{10}$/.test($(this).val())) {
           
            $.ajax({
                type: "POST",
                url: "assets/php/checkeid.php",
                data: {id: $(this).val()},
                success: function (data) {
                    if (data.length != 7) {
                    $("#errorID").text("");
                    $("#reg").prop('disabled', false);
                    }
                    else {
                        $("#reg").prop('disabled', true);
                        $("#errorID").text("This ID is already being used in the system");
                    }
                }
            }
            );   
        }
        else {
            $("#reg").prop('disabled', true);
            $("#errorID").text("National_ID Should be 10 digits only");
        }
    });

    $("#NewID").keyup(function () {

        var patt = new RegExp("(?<!\d)\d{10}(?!\d)");
        var res = patt.test($(this).val());
        if (/^\d{10}$/.test($(this).val()) || $(this).val() == "") {
            $.ajax({
                type: "POST",
                url: "assets/php/checkeid.php",
                data: {id: $(this).val()},
                success: function (data) {
                    if (data.length != 7) {
                    $("#errorID").text("");
                    $("#reg").prop('disabled', false);
                    }
                    else {
                        $("#reg").prop('disabled', true);
                        $("#errorID").text("This ID is already being used in the system");
                    }
                }
            }
            );   
        }
        else {
            $("#reg").prop('disabled', true);
            $("#errorID").text("National_ID Should be 10 digits only");
        }
    });



    $(".Password").keyup(function () {
        if ($("#examplePasswordInput").val() == $("#exampleRepeatPasswordInput").val()) {
            $("#errorPass").text("");
            $("#reg").prop('disabled', false);
            $("#changepass").prop('disabled', false);
        }
        else {
            $("#reg").prop('disabled', true);
            $("#changepass").prop('disabled', false);
            $("#errorPass").text("Password and repeate-password should match");
        }
    });


    $("#email").keyup(function () {
        $.ajax({
            type: "POST",
            url: "assets/php/checkemail.php",
            data: 'email=' + $(this).val(),
            success: function (data) {

                if (data.length != 7) {
                    $("#erroremail").text("");
                    $("#reg").prop('disabled', false);
                }
                else {
                    $("#reg").prop('disabled', true);
                    $("#erroremail").text("This email is already in the system");
                }
            }
        }
        );
    });


    $("#changeemail").keyup(function () {


        var nemail = $(this).val();
        
        var nid = $("#NewID").attr('placeholder');
        if(validateEmail(nemail))
        {
            $.ajax({
                type: "POST",
                url: "assets/php/checkemail.php",
                data: { email: nemail, id: nid },
                success: function (data) {
                    if (data.length != 7) {
                        $("#reg").prop('disabled', false);
                        $("#erroremail").text("");
                        $("#savechange").prop('disabled', false);
                    }
                    else {
                        $("#reg").prop('disabled', true);
                        $("#savechange").prop('disabled', true);
                        $("#erroremail").text("This email is already being used in the system");
                    }
                }
            }
            );
        }else if(nemail!=""){
            $("#erroremail").text("Please enter valid email");
        }
    });

    $(".changePassword").keyup(function () {
        if ($("#examplePasswordInput").val() == "" && $("#examplePasswordInput").val() == $("#exampleRepeatPasswordInput").val()) {
            $("#changepass").prop('disabled', true);
            $("#errorPass").text("");
        }
        else if ($("#examplePasswordInput").val() == $("#exampleRepeatPasswordInput").val()) {
            $("#errorPass").text("");
            $("#changepass").prop('disabled', false);
        }
        else {
            $("#changepass").prop('disabled', true);
            $("#errorPass").text("Password and repeate-password should match");
        }
    });



    $(".changePassword").keyup(function () {
        if ($("#examplePasswordInput").val() == $("#exampleRepeatPasswordInput").val()) {
            $("#errorPass").text("");
            $("#reg").prop('disabled', false);
        }
        else {
            $("#reg").prop('disabled', true);
            $("#errorPass").text("Password and repeate-password should match");
        }
    });









});