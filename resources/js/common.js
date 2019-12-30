

// Maps

function mapsInitialize() {
    console.log('mapsInitialize');

    $('.js-map').each(function() {

        var lat = $(this).attr('data-lat');
        var lng = $(this).attr('data-lng');
        var zoom = $(this).attr('data-zoom');
        var title = $(this).attr('data-title');
        var description = $(this).attr('data-description');

        console.log('Mapa Lat: ' + lat);

        var mapStyle = [{ "featureType": "all", "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "lightness": 40 }, { "color": "#266885" }] }, { "featureType": "all", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "all", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "lightness": 1 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#d6e2e6" }, { "lightness": 1 }, { "weight": 1.2 }] }, { "featureType": "administrative.country", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "administrative.province", "elementType": "labels.text.fill", "stylers": [{ "color": "#36738d" }] }, { "featureType": "administrative.locality", "elementType": "geometry.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{ "color": "#36738d" }] }, { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#d6e2e6" }, { "lightness": 1 }] }, { "featureType": "landscape", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "color": "#e5edf0" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#d8e3e8" }, { "lightness": 1 }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "poi.attraction", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "poi.business", "elementType": "geometry.fill", "stylers": [{ "color": "#d8e3e8" }] }, { "featureType": "poi.government", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [{ "color": "#d8e3e8" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#d8e3e8" }, { "lightness": 1 }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "color": "#bdd0da" }] }, { "featureType": "poi.school", "elementType": "geometry.fill", "stylers": [{ "color": "#e5edf0" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [{ "color": "#e5edf0" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#4b8099" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#d8e3e8" }, { "lightness": "0" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#a3bfcc" }, { "lightness": "0" }, { "weight": "2.00" }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#c1d3db" }] }];
        var placeholder = new google.maps.MarkerImage("/images/placeholder.png", null, null, null, new google.maps.Size(45, 45));


        // Create the map
        var map = new google.maps.Map(this, {
            zoom: parseInt(zoom),
            styles: mapStyle,
            center: new google.maps.LatLng(lat, lng)
        });

        // Add a marker
        var marker = new google.maps.Marker({
            map: map,
            icon: placeholder,
            position: new google.maps.LatLng(lat, lng)
        });

        var contentString = '<div class="map-infowindow">' +
            '<h3>' + title + '</h3>' +
            '<p>' + description + '</p></div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);

    });

}