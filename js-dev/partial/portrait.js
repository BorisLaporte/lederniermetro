var Portrait = function(){

	// DOM
	this.id = 'portrait';
	this.articleWrapper = $('.article_wrapper');
	this.sideContainer = $('.side_container');
	this.window = $(window);

	// Get div heights
	this.articleHeight = this.articleWrapper.height();

	this.init();

};

// Init view
Portrait.prototype.init = function() {

	this.bind();

};

// Bind view events
Portrait.prototype.bind = function(){

	var self = this;
	var widthWindow = this.window.width();

	if(widthWindow > 960){
		self.window.on('resize', function(){

			self.articleHeight = self.articleWrapper.height();
			self.setSize();

		});
	}
	

};

// Set side container size
Portrait.prototype.setSize = function(){

	var self = this;

	this.sideContainer.css("height", this.articleHeight+33);

};







