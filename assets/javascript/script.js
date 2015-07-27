var currentUrl = location.hash.substr(2);
var isMouseOverWindowElement = false;

function urlHandler(url) {
	var _url =  url;
	switch(_url) {
		case 'about':
			ABOUT.show();
			DONATE.hide();
			WEBLOG.hide();
			LINKS.hide();
			break;
		case 'about/abstract':
		case 'about/hardware':
		case 'about/software':
			ABOUT.show();
			ABOUT.showSub(_url.substr(_url.indexOf('/')+1));
			DONATE.hide();
			WEBLOG.hide();
			LINKS.hide();
			break;
		case 'donate':
			DONATE.show();
			ABOUT.hide();
			WEBLOG.hide();
			LINKS.hide();
			break;
		case 'links':
			LINKS.show();
			DONATE.hide();
			ABOUT.hide();
			WEBLOG.hide();
			break;
		default:
			ABOUT.hide();
			DONATE.hide();
			LINKS.hide();
			setTimeout(function(){
				WEBLOG.show();
			},350);
	}
}

function init() {
	setTimeout(function(){
		urlHandler(currentUrl);
	},500);
}

function returnToHomepage() {
}

init();

window.addEventListener('hashchange',function(e){
	urlHandler(location.hash.substr(2));
	e.preventDefault();
});

var windowElements = document.querySelectorAll('section.window');
for (var i = 0; i < windowElements.length; i++) {
	var windowElement = windowElements[i];
	windowElement.addEventListener('mouseover',function(){
		isMouseOverWindowElement = true;
	});
	windowElement.addEventListener('mouseout',function(){
		isMouseOverWindowElement = false;
	});
}

document.addEventListener('click',function(e){
	if (isMouseOverWindowElement === false) {
		location.hash = '#!';
	}
});

window.addEventListener('keypress',function(e){
	if (e.keyCode === 27 && location.hash !== '#!' && location.hash !== '') {
		location.hash = '#!';
	}
});
