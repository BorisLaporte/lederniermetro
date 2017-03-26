var BigMap = function($target){

	this.target = $target;
	this.bubbles = [];
	this.infowindow = new google.maps.InfoWindow();
	this.it = null;
	this.bounds = null;
	this.init($target);
}

BigMap.prototype.init = function($target){

	var markers = this.target.find('.marker');

	var args = {
		zoom		: 14,
		center		: new google.maps.LatLng(48.866667, 2.333333),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	// create map	        	
	this.it = new google.maps.Map( $target[0], args);

	this.addAllMarkers(markers);
	this.centerMap();
	this.bindEvents();
	this.bindSideMenu();
}

BigMap.prototype.bindEvents = function(){
	var self = this;
	google.maps.event.addListener( self.it, "click", function(){
		self.infowindow.close();
	});
}

BigMap.prototype.setStyle = function(){

		// Reference to the DIV which receives the contents of the infowindow using jQuery
		var iwOuter = $('.gm-style-iw');

		// Moves the infowindow 115px to the right.
		// iwOuter.parent().parent().css({left: '115px'});

		/* The DIV we want to change is above the .gm-style-iw DIV.
		* So, we use jQuery and create a iwBackground variable,
		* and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
		*/
		var iwBackground = iwOuter.prev();

		// Remove the background shadow DIV
		iwBackground.children(':nth-child(2)').css({'display' : 'none'});

		// Remove the white background DIV
		iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		// Moves the shadow of the arrow 76px to the left margin 
		iwBackground.children(':nth-child(1)').css({'display' : 'none'});

		// Moves the arrow 76px to the left margin 
		iwBackground.children(':nth-child(3)').children(':nth-child(1)').children(':nth-child(1)').css({'box-shadow' : 'none'});
		iwBackground.children(':nth-child(3)').children(':nth-child(2)').children(':nth-child(1)').css({'box-shadow' : 'none'});
}

BigMap.prototype.centerMap = function(){
	var self = this;

	this.bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( this.bubbles, function( i, bubble ){
		var latlng = new google.maps.LatLng( bubble.position.lat(), bubble.position.lng() );
		self.bounds.extend( latlng );
	});

	// only 1 marker?
	if( this.bubbles.length == 1 )
	{
		// set center of map
	    this.it.setCenter( this.bounds.getCenter() );
	    this.it.setZoom( 14 );
	}
	else if ( this.bubbles.length > 1 )
	{
		// fit to bounds
		this.it.fitBounds( this.bounds );
	}
}

BigMap.prototype.addAllMarkers = function($markers){
	var self = this;
	$markers.each(function(){
		self.bubbles.push(self.addOneMarker( $(this) ))
	})

}

BigMap.prototype.addOneMarker = function($marker){

	var self = this;
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	
	var bubble = new google.maps.Marker({
		position	: latlng,
		map			: self.it
	});

	bubble.idMarker = $marker.attr('data-id');

	if( $marker.html() )
	{
		bubble.iwContent = $marker.html();

		google.maps.event.addListener( bubble, 'click', function(){
			self.infowindow.open(self.it, bubble);
			self.infowindow.setContent($marker.html());
		});
	}
	return bubble;
}

BigMap.prototype.bindSideMenu = function(){
	var self = this;
	self.elements = $('[data-adresse]');
	if ( self.elements.length > 0 ){
		self.elements.on('click',function(e){
			e.preventDefault();
			var id = $(this).attr('data-id');
			self.focusOnMarker(id);
		});
	}
}

BigMap.prototype.focusOnMarker = function(id){
	var self = this;
	$.each( this.bubbles, function( i, bubble ){
		if (bubble.idMarker == id ){
			self.infowindow.open(self.it, bubble);
			self.infowindow.setContent(bubble.iwContent);
			return true;
		}
	});
	return false;
}



jQuery(document).ready(function($) {

	var map = null;

	var html_map = $('.acf-map');

	if ( html_map.length > 0 ){
		$('.acf-map').each(function(){
				map = new BigMap( $(this) );
		});
	}

});