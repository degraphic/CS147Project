<?php
// TODO(all): fix a bug where nothing appears on this page from time to time, until
// it is refreshed. I suspect this might be because of caching.
// - yacinem
// Update: I think I've fixed this, let me know if you see it again - yacinem
require("php/header.php");
?>
<div data-role="page">

	<div data-role="header" data-theme="a">
    	<a href="index.php" data-icon="arrow-l" data-ajax="false">Home</a>
		<h1>Serentripity</h1>
        <a href="#popupHelp" data-rel="popup" data-position-to="window" data-transition="fade" data-icon="info">Help</a>
	</div><!-- /header -->

	<div data-role="content" data-theme="a">
        <!-- Username <?php echo $username ?> -->
    	<div id="serentripity-montage">
   			<h3>Places near you</h3>
    	</div>
    	<div data-role="popup" id="popupHelp" data-theme="a" class="ui-corner-all">
    		<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
    		<p>This page displays all the landmarks near your current location. To get started, pick a place you find interesting and click on it to find out more.</p>
            <p>Troubleshooting: if you see a blank page, hit refresh and make sure you allow Serentripity to find your location.</p>
    	</div>
    </div>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
    var lat ;
    var lng ;
    function success(position){
        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        lat = latlng.lat();
        lng = latlng.lng();
        var montage_element;
        montage_element =  $("#serentripity-montage");
        site.montage(lat,lng,montage_element);
    }
    function error(msg) {
        lat = 0;
        lng = 0;
        console.log(msg);
    }
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        error('not supported');
    }
    </script>
</div>
<?php
require("php/footer.php");
?>
