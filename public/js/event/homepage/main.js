// $(document).ready(function() {
//     $("#loading").show();

//     $(window).on('load', function() {
//         $("#loading").hide();
//     });
// });




// bar選單的hover動畫
$(".menu").hover(
    function () {
        $("." + this.dataset.menuaction + "")
            .stop(true, true)
            .slideDown(500);
    },
    function () {
        $("." + this.dataset.menuaction + "")
            .stop(true, true)
            .slideUp(500);
    }
);






