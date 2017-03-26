var Share = function(target){
	this.target = target;
	this.urlToShare = this.target.attr('data-url');
	this.init();
}

Share.prototype.init = function(){
	this.bind();
}

Share.prototype.bind = function(){
	var self = this;
	this.target.on('click', function(e){
		e.preventDefault();
		if ( self.target.attr('data-share') == "facebook"){
			self.shareFacebook(self.urlToShare);
		} else if ( self.target.attr('data-share') == "twitter" ){
			self.shareTwitter(self.urlToShare);
		} else if ( self.target.attr('data-share') == "instagram" ){
			self.shareInstagram();
		} else {

		}
	});
}

Share.prototype.shareFacebook = function(url){
	window.open('https://www.facebook.com/sharer/sharer.php?u='+url,'facebook-share-dialog',"width=626,height=436");
}

Share.prototype.shareTwitter = function(url){
	window.open('https://twitter.com/intent/tweet?url='+url,'twitter-share-dialog',"width=626,height=436");
}

Share.prototype.shareInstagram = function(url){

}

jQuery(document).ready(function($) {

	var share = [];
	var shareHtml = $('[data-share]');
	if ( shareHtml.length > 0 ){
		$(shareHtml).each(function(){
			share.push(new Share( $(this) ));
		});
	}

});