$(document).ready(function () {

    var myLatlng=new google.maps.LatLng(27.717245, 85.323960);
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatlng,
       /* scrollwheel: false,*/
        zoom: 12
    });
    
    function createMarker(latlng,icn,name) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            title:name
        });
    }


    var request = {
        location: myLatlng,
        radius: '2500',
        types: ['hospital']
    };


    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

    function callback(results, status) {

        if (status == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                var place = results[i];

                latlng=place.geometry.location;
                icn=place.icon;
                name=place.name;
                createMarker(latlng,icn,name);
            }
        }
    }

});