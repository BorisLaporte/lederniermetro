var Mobile = function(){

	// DOM
	this.mobileMenu = $('.menu_wrapper');
	this.triggerMobileMenu = $('.burger_wrapper');

	this.init();

};

// Init view
Mobile.prototype.init = function() {

	this.bind();

};

// Bind view events
Mobile.prototype.bind = function(){

	var self = this;
	this.triggerMobileMenu.on('click',function(){
		self.mobileMenu.toggleClass('mobileActive');
	});

};



