var DropM = function(target){
	this.target = target;
	this.btn = target.find('legend');
	this.menu = target.find('ul');
	this.init();
}

DropM.prototype.init = function(){
	this.bind();
}

DropM.prototype.bind = function(){
	var self = this;
	this.btn.on('click',function(){
		self.menu.toggleClass('active');
	});
}


jQuery(document).ready(function($) {

	var dropM = null;

	var dropMHtml = $('[dropdown-input]');

	if ( dropMHtml.length > 0 ){
		$(dropMHtml).each(function(){
				dropM = new DropM( $(this) );
		});
	}

});