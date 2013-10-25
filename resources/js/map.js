// This example displays a marker at the center of Australia.
// When the user clicks the marker, an info window opens.

function initialize() {
  var myLatlng = new google.maps.LatLng(43.03789,-76.133569);
  var mapOptions = {
    zoom: 24,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = 'Hello world';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Uluru (Ayers Rock)'
  });
    infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);