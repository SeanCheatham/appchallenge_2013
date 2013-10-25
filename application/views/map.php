
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shout!</title>
	<style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }

    </style>
	<link rel="stylesheet" href="<?php echo base_ul('resources/css/bootstrap.min.js'); ?>" />
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="<?php echo base_url('resources/js/bootstrap.js'); ?>"></script>
	<script type="text/javascript">
		var map;
		function initialize() {
			var myLatlng = new google.maps.LatLng(43.0379,-76.1336);
			var mapOptions = {
				zoom: 24,
				center: myLatlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			google.maps.event.addListener(map, 'click', function(event){addPin(event.latLng)});
			var pins = new Array();
		<?php foreach($pins as $pin) { echo "pins.push(new google.maps.InfoWindow({content:'".$pin['text']."'}).open(map,new google.maps.Marker({position: new google.maps.LatLng(".$pin['latitude'].",".$pin['longitude']."), map:map})));\n";} ?>
		}

		function addPin(pos) {
			var addPinContent = '<form action="addPin" method="post"><input type="text"><button type="submit" value="Pin"></form>';
			var addPin = new google.maps.InfoWindow({content:addPinContent}).open(map,new google.maps.Marker({position: pos, map:map}))
		
		}
		google.maps.event.addDomListener(window, 'load', initialize);

	</script>
</head>
<body>
	<div id="map-canvas">
		
	</div>
</body>
</html>