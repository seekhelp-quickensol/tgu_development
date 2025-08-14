$(".first-s-head").show();
$(".steps-ul li, .second-step").click(function() {
    $(".first-s-head").hide();
    $(".third-s-head").hide();
    $(".second-s-head").show();
    $(".steps-ul").hide(800);
    $(".step-s-container").show("300");
    $(".second-step").addClass("progress-step-active")
    $(".first-step").removeClass("progress-step-active")
});
$(".first-step").click(function() {
    $(".steps-ul").show("slow");
    $(".step-s-container").hide(1000);
    $(".first-s-head").show();
    $(".second-s-head").hide();
    $(".second-step").removeClass("progress-step-active")
    $(".first-step").addClass("progress-step-active")
});
$(".second-step").click(function() {
    id = $("#law_category").val();
    $(".step-t-container").hide("slow");
    $(".steps-ul").hide("slow");
    $(".step-s-container").show(500);
    $(".first-s-head").hide();
    $(".second-s-head").show();
    $(".third-s-head").hide();
    $(".second-step").addClass("progress-step-active")
    $(".first-step").removeClass("progress-step-active")
    $(".third-step").removeClass("progress-step-active")
});


$(".third-step").click(function() {
    $(".step-t-container").show("slow");
    $(".step-s-container").hide(500);
    $(".steps-ul").hide("500");
    $(".first-s-head").hide();
    $(".second-s-head").hide();
    $(".third-s-head").show();
    $(".second-step").removeClass("progress-step-active")
    $(".first-step").removeClass("progress-step-active")
    $(".third-step").addClass("progress-step-active")
});
$(".back-2").click(function() {

    $(".second-step").removeClass("progress-step-active")
    $(".first-step").addClass("progress-step-active")
    $(".step-s-container").hide(500);

    $(".steps-ul").show("slow");
    $(".first-s-head").show();
    $(".steps-ul").on('click', 'li', function() {
        $(this).addClass("border-red"); // adding active class
    });

    $(".second-s-head").hide();
});
$(".back-3").click(function() {

    $(".third-step").removeClass("progress-step-active")
    $(".second-step").addClass("progress-step-active")
    $(".third-s-head").hide();
    $(".second-s-head").show();
    $(".step-t-container").hide(500);
    $(".step-s-container").show("slow");
});