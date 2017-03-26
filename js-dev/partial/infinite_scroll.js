var LoaderInf = function(target){
	this.target = target;
	this.btn = target.find('[data-btn-load-more]');
	this.gif = target.find('[data-gif-loader]');
	this.resultsContainer = $('[data-results-container]');
	this.action = "get_more_results";
	this.args = null;
	this.type = null;
	this.nbPosts = null;
	this.mobile = null;
	this.offset = null;
	this.smScene = null;
	this.smController = null;
	this.$ = $;
	this.init();
}

LoaderInf.prototype.init = function(){
	this.args = this.btn.attr('data-args');
	this.type = this.btn.attr('data-type');
	this.nbPosts = this.btn.attr('data-nb-posts');
	this.mobile = this.btn.attr('data-mobile');
	this.offset = parseInt(this.nbPosts);
	this.bindClick();
}

LoaderInf.prototype.bindClick = function(){
	self = this;
	this.btn.on('click', function(e){
		e.preventDefault();
		self.btn.css('display', 'none');
		self.gif.addClass('visible');
		self.bindScroll();
	});
}

LoaderInf.prototype.bindScroll = function(){
	self = this;

	this.smController = new ScrollMagic.Controller();

	this.smScene = new ScrollMagic.Scene({triggerElement: '.infinite_scroll', triggerHook: "onEnter"})
		.addTo(self.smController)
		.on("enter", function (e) {
			if ( !self.target.hasClass('active') ){
				self.target.addClass('active');
				self.getResults(self.action, self.type, self.args, self.offset, self.mobile);
			}
		});
}

LoaderInf.prototype.getResults = function(action, type, args, offset, mobile){
	self = this;
	this.$.post(
	    ajaxurl,
	    {
	        'action': action,
	        'type': type,
	        'arguments': args,
	        'mobile': mobile,
	        'offset': offset
	    },
	    function(response){
	    	if ( response != "" ){
		    	self.offset += parseInt(self.nbPosts);
		    	self.resultsContainer.append(response);
		    	self.smScene.update();
				self.target.removeClass("active");
	    	} else {
	    		self.gif.removeClass('visible');
	    	}
        }
	);
}


jQuery(document).ready(function($) {

	var loader = null;
	var loaderHtml = $("[data-loader]");
	if ( loaderHtml.length > 0 ){
		loaderHtml.each(function(){
			loader = new LoaderInf( $(this) );
		});
	}

});