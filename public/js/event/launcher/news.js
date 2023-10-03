$(function() {
	//轮播图
	jQuery(".slideBox").slide({
		mainCell:".item-wrapper ul",
		titCell:".hd ul",
		autoPage:true,
		autoPlay:true,
	});
	//新闻
	jQuery(".news-container").slide({
		titCell:".head a",
		mainCell:".context"
	});
})
