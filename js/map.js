var map;            // stores the map globall inside a particular context
var markers = [];   // stores the markers info each time a new marker is placed inside a map

function initMap() {

    var lat_lng = $('#lat-lng').val();

    // Default starting position

    if(lat_lng){

        lat_lng = lat_lng.split(',');

        var coordinates = {lat: parseFloat(lat_lng[0]), lng: parseFloat(lat_lng[1])};       // probably need to geolocate and passing the lat and lng

    }else{
        var coordinates = {lat: 27.705442, lng: 85.326172};       // probably need to geolocate and passing the lat and lng
    }
    // A map is created
    map = new google.maps.Map(document.getElementById('map'), {
        center: coordinates,
        zoom: 19,
        streetViewControl: false,
        scaleControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // delete previous marker
        deleteMarkers();

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    // Try HTML5 geolocation.
    if (navigator.geolocation) {

        addMarker(coordinates);

    } else {
        // Browser doesn't support Geolocation
        console.log('Browser doesnt support geolocation');
    }

    // Adds a marker at the center of the map.


    // This event listener will call addMarker() when the map is clicked.
    map.addListener('click', function(event) {


        // remove the previous marker
        deleteMarkers();

        // add recently clicked position as a marker
        addMarker(event.latLng);

        $('#lat-lng').val(event.latLng.lat() + ',' + event.latLng.lng());

    });

}

// Adds a marker to the map and push to the array.
function addMarker(location) {

    // adding mareker in the map
    var marker = new google.maps.Marker({
        position: location,
        title:'Kavyansh Education',
        map: map
    });

    // adding newly added marker in the marker list
    markers.push(marker);

}

// Sets the map on all markers in the array.
function setMapOnAll(map) {

    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);     // if map = null, then the markers[i] will be removed
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}


// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}




