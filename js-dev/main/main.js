$(document).ready(function(){

	var Main = function(){

		// DOM
		this.id = 'main';
		this.headerScrollItem = $('.header_scroll_wrapper');
		this.subCategoriesHeader = $('.sub-categories-header');
		this.menuItem = $('.menu_item');
		this.window = $(window);

		this.init();

	};

	// Init view
	Main.prototype.init = function() {

		this.bind();

		new Home();
		new Portrait();
		new Mobile();

	};

	// Bind view events
	Main.prototype.bind = function(){

		var self = this;
		var isAlive = false;

		var windowWith = this.window.width();

		this.window.on('scroll', function(){

			// Menu
			if(self.window.scrollTop() > 240 && isAlive == false && windowWith > 960){

				self.animateHeaderIn();
				isAlive = true;
					
			}
			if(isAlive == true && self.window.scrollTop() < 200){

				self.animateHeaderOut();
				isAlive = false;

			}

		});

		this.menuItem.on('mouseenter', function(e){

			var menuSelected = $(e.currentTarget).attr('menu-selector');
			
			switch (parseInt(menuSelected)) {
			  case 0:
			  	self.showSubCategories(0);
			    break;
			  case 1:
			  	self.showSubCategories(1);
			    break;
			  case 2:
			  	self.showSubCategories(2);
			    break;
			  case 3:
			  	self.showSubCategories(3);
			    break;
			}
		});

		this.menuItem.on('mouseleave', function(e){

			var menuSelected = $(e.currentTarget).attr('menu-selector');
			
			switch (parseInt(menuSelected)) {
			  case 0:
			  	self.hideSubCategories(0);
			    break;
			  case 1:
			  	self.hideSubCategories(1);
			    break;
			  case 2:
			  	self.hideSubCategories(2);
			    break;
			  case 3:
			  	self.hideSubCategories(3);
			    break;
			}
		});
		

	};

	//Animate header in
	Main.prototype.animateHeaderIn = function(){

		var self = this;

		this.headerScrollItem.velocity({
			translateY: ["60px","0px"]
		}, {
			duration: 400,
			delay: 0,
			easing: [300, 50],
			display: "block"
		});

	};

	//Animate header out
	Main.prototype.animateHeaderOut = function(){

		var self = this;

		this.headerScrollItem.velocity({
			translateY: ["0px","60px"]
		}, {
			duration: 500,
			delay: 0,
			easing: [300, 30],
			display: "none"
		});

	};

	//Animate sub categories header in
	Main.prototype.showSubCategories = function(menuSelected){

		var self = this;
		this.subToShow = $('[sub-selector="'+ menuSelected +'"]');
		this.subToShow.velocity("finish");
		this.addMenuOn = $('[menu-selector="'+ menuSelected +'"]');
		this.addMenuOn.addClass('menuOn');

		this.subToShow.velocity({
			opacity: 1
		}, {
			duration: 250,
			delay: 0,
			easing: "ease",
			display: "block"
		});

	};

	//Animate sub categories header in
	Main.prototype.hideSubCategories = function(menuSelected){

		var self = this;
		this.subToHide = $('[sub-selector="'+ menuSelected +'"]');
		this.subToHide.velocity("finish");
		this.deleteMenuOn = $('[menu-selector="'+ menuSelected +'"]');
		this.deleteMenuOn.removeClass('menuOn');

		this.subToHide.velocity({
			opacity: 0
		}, {
			duration: 200,
			delay: 0,
			easing: "ease",
			display: "none"
		});

	};

	new Main();
	   

});