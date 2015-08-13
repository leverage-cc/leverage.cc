/* global Velocity */

function Donate() {

	var _element = document.querySelector('[data-id="donate"]');
	var _mainnavAElement = document.querySelector('[data-id="mainheader"]').querySelector('a[href="#!donate"]');
	var _donationMeterElement = _element.querySelector('.donation_meter');
	var _donationMeterDonatedElement = _donationMeterElement.querySelector('.donated');

	var _sum = _donationMeterElement.dataset.sum;
	var _donated = _donationMeterElement.dataset.donated;

	function _hide(duration) {
		if (_element.hidden === false || duration === 0) {
			var _duration = (typeof(duration) === 'undefined') ? 350 : duration;
			_hideDonationMeter();
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
					_mainnavAElement.href = '#!donate';
					_donationMeterDonatedElement.style.height = null;
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
					_animate_donationMeter();
				}
			});
		}
	}

	function _animate_donationMeter() {
		var _height = Math.round((_donated/_sum)*100);
		Velocity(_donationMeterDonatedElement,{
			height: _height+'%'
		},{
			duration: 350,
			easing: 'easeOutCubic',
			complete: function() {
				setTimeout(function(){
					_donationMeterElement.classList.add('hover');
					setTimeout(function(){
						_donationMeterElement.classList.remove('hover');
					},350);
				},350);
			}
		});
	}

	function _hideDonationMeter() {
		_donationMeterElement.classList.remove('active');
	}

	function _showDonationMeter() {
		_donationMeterElement.classList.add('active');
	}

	function _init() {
		_hide(0);
	}

	_donationMeterElement.addEventListener('click',function(){
		if (_donationMeterElement.classList.contains('active')) {
			_hideDonationMeter();
		} else {
			_showDonationMeter();
		}
	});

	_init();

	this.element = _element;
	this.hide = _hide;
	this.show = _show;

}

var DONATE = new Donate();
