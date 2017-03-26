var GoUp = function(target){
	this.target = target;
	if ( $(window).width() > 961 ){
		this.init();
		this.time = 600;
	}
}

GoUp.prototype.init = function(){
	var self = this;
	$(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            self.target.fadeIn();
        } else {
            self.target.fadeOut();
        }
	});

	this.bind();
}

GoUp.prototype.bind = function(){
	var self = this;

	this.target.on('click', function(e){
		e.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, self.time);
        return false;
		
	});
}


jQuery(document).ready(function($) {

	var goUp = null;

	var html_go_up = $('[data-go-up]');

	if ( html_go_up.length > 0 ){
		$(html_go_up).each(function(){
				goUp = new GoUp( $(this) );
		});
	}

});