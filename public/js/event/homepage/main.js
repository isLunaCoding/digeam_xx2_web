// $(document).ready(function() {
//     $("#loading").show();

//     $(window).on('load', function() {
//         $("#loading").hide();
//     });
// });




// bar選單的hover動畫
$(".menu , .menu li, .menu li ul").hover(
    function () {
        $("." + this.dataset.menuaction + "")
            .stop(true, true)
            .slideDown(500);
    },
    function () {
        $("." + this.dataset.menuaction + "")
            .stop(true, false)
            .slideUp(300);
    }
);






