/* global Velocity */

function Weblog() {

	var _element = document.querySelector('[data-id="weblog"]');

	function _show(duration) {
  	debugger;
    _element.style.opacity = null;
		_element.style.translateY = null;

  	_element.hidden = false;
	}

	function _hide(duration) {
		if (_element.hidden === false || duration === 0) {
			var _duration = (typeof(duration) === 'undefined') ? 350 : duration;
			Velocity(_element,{
				opacity: 0,
				translateY: '1em'
			}, {
				duration: _duration,
				easing: 'easeInCubic',
				complete: function() {
					_element.hidden = true;
				}
			});
		}
	}

	function init() {
	}

	init();

	this.show = _show;
	this.hide = _hide;

}

var WEBLOG = new Weblog();