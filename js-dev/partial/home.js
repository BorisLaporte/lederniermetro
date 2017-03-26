var Home = function(){

	// DOM
	this.id = 'home';
	this.window = $(window);
	this.homeContainer = $('#home');
	this.contentWrapper = $('.content_wrapper');
	this.adressWrapper = $('.goodadress_container');
	this.cultureWrapper = $('.culture_container');
	this.sideInformation = $('.content_sideinformation');
	this.sideInformationTxt = $('.sideInformation');

	// Get div heights
	this.contentHeight = this.contentWrapper.height();
	this.adressHeight = this.adressWrapper.height();
	this.cultureHeight = this.cultureWrapper.height();
	this.pageWidth = this.window.width();

	this.sideInformationPosition = (this.pageWidth/2)-650;

	this.init();

};

// Init view
Home.prototype.init = function() {

	this.bind();

};

// Bind view events
Home.prototype.bind = function(){

	var self = this;

	// Bind scroll events
	var isAlive = false,
		sideInfoAlive = false;

	this.window.on('scroll', function(){

		// Side content information
		self.windowY = window.innerHeight;
		self.minimumScroll = 540;
		self.starterBreakpoint = self.window.scrollTop() - self.minimumScroll;
		self.maximumScroll = self.window.scrollTop()*0.28;
		self.txtValue = self.sideInformationTxt.text();
		self.middleBreakpoint = self.adressHeight-50;

			
		if(self.starterBreakpoint > 0 && sideInfoAlive == false && self.maximumScroll <  self.windowY){

			self.animateInSideInformation();
			sideInfoAlive = true;

		}

		if(sideInfoAlive == true && self.starterBreakpoint < 0 ){

			self.animateOutSideInformation();
			sideInfoAlive = false;

		}

		if(sideInfoAlive == true && self.maximumScroll > self.windowY){

			self.animateOutSideInformation();
			sideInfoAlive = false;
		}

		if(self.starterBreakpoint > self.middleBreakpoint && self.txtValue == "bonnes adresses"){
			var txt = "culture";
			self.animateOutTxt(txt);
			self.animateInTxt();
			
		}

		if(self.starterBreakpoint < self.middleBreakpoint && self.txtValue == "culture"){
			var txt = "bonnes adresses";
			self.animateOutTxt(txt);
			self.animateInTxt();
			
		}

	});

	this.sideInformation.velocity({
		translateX: this.sideInformationPosition,
		rotateZ: "-90deg"
	}, {
		duration: 0,
		delay: 0
	});

};


// Animate In side content information
Home.prototype.animateInSideInformation = function(){

	var self = this;

	this.sideInformation.velocity("stop"); 

	this.sideInformation.velocity({
		opacity: 1
	}, {
		duration: 500,
		delay: 0,
		easing: [300, 30],
		display: "block"
	});

};

// Animate Out side content information
Home.prototype.animateOutSideInformation = function(){

	var self = this;

	this.sideInformation.velocity("stop"); 

	this.sideInformation.velocity({
		opacity: 0
	}, {
		duration: 500,
		delay: 0,
		easing: [300, 30],
		display: "none"
	});

};


// Change txt side content information
Home.prototype.changeTxtInformation = function(text){

	var self = this;
	var newTxt = text;

	this.sideInformationTxt.text(newTxt);

};

// Animate Out Txt
Home.prototype.animateOutTxt = function(txt){

	var self = this;
	var txt = txt;
	this.sideInformationTxt.velocity("finish"); 


	this.sideInformationTxt.velocity({
		opacity: [0,1]
	}, {
		duration: 500,
		delay: 0,
		easing: [300, 30],
		complete: function(){
			self.changeTxtInformation(txt);
		}
		
	});

};

// Animate In Txt
Home.prototype.animateInTxt = function(){

	var self = this;
	this.sideInformationTxt.velocity("finish"); 

	this.sideInformationTxt.velocity({
		opacity: [1,0]
	}, {
		duration: 500,
		delay: 200,
		easing: [300, 30]
		
	});

};

