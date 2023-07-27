const box = document.getElementById('rainBox');
let boxHeight = box.clientHeight;
let boxWidth = box.clientWidth;
let w = $(window).width();
window.onresize = function() {
	boxHeight = box.clientHeight;
	boxWidth = box.clientWidth;
}
function rainDot() {
	let rain = document.createElement('div');
	rain.classList.add('rain');
	rain.style.top = 0;
	rain.style.left = `${Math.random() * boxWidth}px`;
	rain.style.opacity = Math.random();
	box.appendChild(rain);
				
	let gap = 1;
	const loop = setInterval(() => {
		if (parseInt(rain.style.top) > boxHeight) {
			clearInterval(loop);
			box.removeChild(rain)
		}
		gap++
		rain.style.top = `${parseInt(rain.style.top)+gap}px`;
	}, 0)
}
setInterval(() => {
	rainDot();
}, 0);
