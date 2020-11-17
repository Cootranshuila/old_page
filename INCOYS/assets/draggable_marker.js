/*
 * @fileoverview Sets up map with a single marker which can be
 * dragged around the map and report it's lat, lng.
 */

/*
 * Update the position of our 'marker-position' marker.
 * @param: latLng Maps LatLng object.
 */
function updateMarkerPositionTxt(latLng) {
  $("#inputlatitudestb").val(latLng.lat());
  $("#inputlongitudestb").val(latLng.lng());
}

function updateMarkerPositionTxt2(latLng) {
  $("#inputlatitudlim").val(latLng.lat());
  $("#inputlongitudelim").val(latLng.lng());
}

/*
 * Sets up Google map into 'map-canvas' div and adds the
 * the starting marker and a drag listener.
 */
function initialize() {

  var latitude   = $("#inputlatitudestb").val();
  var longitude  = $("#inputlongitudestb").val();

  var latLng = new google.maps.LatLng(latitude,longitude);
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
      zoom: 15,
      center: latLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
      position: latLng,
      title: 'Draggable Marker',
      map: map,
      draggable: true
  });

  // Update marker position txt.
  updateMarkerPositionTxt(latLng);

  google.maps.event.addListener(marker, 'drag', function() {
      updateMarkerPositionTxt(marker.getPosition());
  });

}

function initialize2() {

  var latitude   = $("#inputlatitudlim").val();
  var longitude  = $("#inputlongitudelim").val();

  var latLng = new google.maps.LatLng(latitude,longitude);
  var map = new google.maps.Map(document.getElementById('map-canvas2'), {
      zoom: 15,
      center: latLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
      position: latLng,
      title: 'Draggable Marker',
      map: map,
      draggable: true
  });

  // Update marker position txt.
  updateMarkerPositionTxt2(latLng);

  google.maps.event.addListener(marker, 'drag', function() {
      updateMarkerPositionTxt2(marker.getPosition());
  });

}

// Onload handler to fire off the app:
google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.addDomListener(window, 'load', initialize2);
