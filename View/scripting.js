$(document).ready(function(){
        $("input").focus(function(){
                $(this).css("background-color", "#333333");
        });
        $("input").blur(function(){
                $(this).css("background-color", "#404040");
        });
    }
);
$(document).ready(function(){
        $(".footerPower").hide().css("color", "white").slideDown(1500);
        $(".headerLeft").hide().toggle(1500);
});



