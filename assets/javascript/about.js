/* global Velocity */

function About() {

	var _element = document.querySelector('[data-id="about"]');
	var _citeElement = _element.querySelector('.cite');
	var _subnavElement = _element.querySelector('.subnav');
	var _sectionsElement = _element.querySelector('.sections');
	var _mainnavAElement = document.querySelector('[data-id="mainheader"]').querySelector('a[href="#!about"]');

	function _hide(duration) {
		if (_element.hidden === false || duration === 0) {
			var _duration = (typeof(duration) === 'undefined') ? 350 : duration;
			Velocity([_citeElement,_subnavElement,_sectionsElement],{
				opacity: 0
			},{
				duration: _duration/4,
				easing: 'easeInCubic'
			});
			Velocity(_element,{
				scale: 0
			}, 
			{
				duration: _duration,
				easing: 'easeInCubic',
				begin: function() {
				},
				complete: function() {
					_element.hidden = true;
					_mainnavAElement.classList.remove('active');
					_mainnavAElement.href = '#!about';
					Velocity(_citeElement,{
						opacity: 0,
						translateY: '1em'
					},{
						duration: 0
					});
					Velocity([_subnavElement,_sectionsElement],{
						opacity: 0
					},{
						duration: 0
					});
				}
			});		}
	}

	function _show(duration) {
		if (_element.hidden === true || duration === 0) {
			var _duration = (typeof(duration) === 'undefined') ? 350 : duration;
			Velocity(_element,{
				scale: 1
			}, 
			{	
				duration: duration,
				easing: 'easeOutCubic',
				begin: function() {
					_element.hidden = false;
					_mainnavAElement.classList.add('active');
					_mainnavAElement.href = '#!';
				},
				complete: function() {
					Velocity(_citeElement,{
						opacity: 1,
						translateY: 0
					}, {
						duration: _duration*3,
						easing: 'easeOutCubic',
						complete: function(){
							Velocity([_subnavElement,_sectionsElement],{
								opacity: 1
							}, {
								duration: _duration*3,
								easing: 'easeOutCubic'
							});
						}
					});
				}
			});
		}
	}

	function _showSub(url) {
		var _url = url;
		var _activeSubnavElement = _subnavElement.querySelector('a[href="#!about/'+_url+'"]');
		var _inactveSubnavElements = _subnavElement.querySelectorAll('a:not([href="#!about/'+_url+'"])');
		for (var i = 0; i < _inactveSubnavElements.length; i++) {
			_inactveSubnavElements[i].classList.remove('active');
		}
		_activeSubnavElement.classList.add('active');
		switch(_url) {
			case 'abstract':
				Velocity(_sectionsElement,{
					translateX: '0%'
				},{
					duration: 350,
					easing: 'easeInOutCubic'
				});
				break;
			case 'about':
				Velocity(_sectionsElement,{
					translateX: '-100%'
				},{
					duration: 350,
					easing: 'easeInOutCubic'
				});
				break;
		}
	}


	function _init() {
		_hide(0);
	}

	_init();

	this.element = _element;
	this.hide = _hide;
	this.show = _show;
	this.showSub = _showSub;

}


var ABOUT = new About();
