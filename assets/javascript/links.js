/* global Velocity */

function Links() {

	var _element = document.querySelector('[data-id="links"]');
  var _mainnavAElement = document.querySelector('[data-id="mainheader"]').querySelector('a[href="#!links"]');

	function _hide(duration) {
		if (_element.hidden === false || duration === 0) {
			var _duration = (typeof(duration) === 'undefined') ? 350 : duration;
			Velocity(_element,{
				opacity: 0,
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
					_mainnavAElement.href = '#!links';
				}
			});
		}
	}

	function _show(duration) {
		if (_element.hidden === true || duration === 0) {
			var _duration = (typeof(duration) === 'undefined') ? 350 : duration;
			Velocity(_element,{
				opacity: 1,
				scale: 1
			}, 
			{	
				duration: _duration,
				easing: 'easeOutCubic',
				begin: function() {
					_element.hidden = false;
					_mainnavAElement.classList.add('active');
					_mainnavAElement.href = '#!';
				},
				complete: function() {
				}
			});
		}
	}

	function _init() {
		_hide(0);
	}

	_init();

	this.element = _element;
	this.hide = _hide;
	this.show = _show;

}

var LINKS = new Links();