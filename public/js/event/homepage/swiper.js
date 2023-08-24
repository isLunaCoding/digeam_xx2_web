(function ($) {
    $.fn.gallery_slider = function (options) {
        var _ops = $.extend(
            {
                imgNum: 4, //圖片數量
                prev: ".prev", //左側按鈕
                next: ".next", //右側按鈕
                gallery_left_middle: ".gallery_left_middle", //左側圖片容器
                gallery_right_middle: ".gallery_right_middle", //左側圖片容器
                threeD_gallery_item: ".threeD_gallery_item", //圖片容器
            },
            options
        );
        var _this = $(this),
            _imgNum = _ops.imgNum, //圖片數量
            _prev = _ops.prev, //左側按鈕
            _next = _ops.next, //右側按鈕
            _gallery_left_middle = _ops.gallery_left_middle, //左側圖片容器
            _gallery_right_middle = _ops.gallery_right_middle, //左側圖片容器
            _threeD_gallery_item = _ops.threeD_gallery_item; //圖片容器

        //左側按鈕綁定點擊事件
        _this.find(_prev).on("click", function () {
            var idx = parseInt(_this.find(_gallery_left_middle).index());
            //當前展示圖片
            _this
                .find(_threeD_gallery_item)
                .eq(idx)
                .removeClass("gallery_left_middle")
                .addClass("front_side");
            //當idx值為0時，執行
            _this
                .find(_threeD_gallery_item)
                .eq(idx == 0 ? idx + _imgNum - 1 : idx - 1)
                .removeClass("gallery_out")
                .addClass("gallery_left_middle");
            //當idx值為_imgNum - 3時，執行
            _this
                .find(_threeD_gallery_item)
                .eq(idx == _imgNum - 3 ? idx + 2 : idx - _imgNum + 2)
                .removeClass("gallery_right_middle")
                .addClass("gallery_out");
            //當idx值為_imgNum - 2時，執行
            _this
                .find(_threeD_gallery_item)
                .eq(idx == _imgNum - 2 ? idx + 1 : idx - _imgNum + 1)
                .removeClass("front_side")
                .addClass("gallery_right_middle");
        });

        //右側按鈕绑定點擊事件
        _this.find(_next).on("click", function () {
            var idx = parseInt(_this.find(_gallery_right_middle).index());
            //當前展示圖片
            _this
                .find(_threeD_gallery_item)
                .eq(idx)
                .removeClass("gallery_right_middle")
                .addClass("front_side");
            //當idx值為0時，執行
            _this
                .find(_threeD_gallery_item)
                .eq(idx == 0 ? idx + _imgNum - 1 : idx - 1)
                .removeClass("front_side")
                .addClass("gallery_left_middle");
            //當idx值為1時，執行
            _this
                .find(_threeD_gallery_item)
                .eq(idx == 1 ? idx + _imgNum - 2 : idx - 2)
                .removeClass("gallery_left_middle")
                .addClass("gallery_out");
            //當idx值為_imgNum - 2時，執行
            _this
                .find(_threeD_gallery_item)
                .eq(idx == _imgNum - 2 ? idx + 1 : idx - _imgNum + 1)
                .removeClass("gallery_out")
                .addClass("gallery_right_middle");
        });
    };
})(jQuery);
