<!DOCTYPE html>
<html>
    <head>
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Google Maps JavaScript API</h1>

        <div id="map" style="width:100%;height:700px;"></div>

        <script>
    
            var position={lat:13.847860,lng:100.604274};

            function myMap() {
            
                var mapOptions = {
                    center:{lat:13.847860,lng:100.604274},
                    zoom:10,
                }
                var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
                var marker,info;
            
                $.getJSON( "json.php", function( jsonObj ) {
                
                $.each(jsonObj, function(i, item){
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(item.lat, item.lng),
                    map: maps,
                
                    title: item.name
                    });

                info = new google.maps.InfoWindow();

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                    info.setContent(item.name);
                    info.open(maps, marker);
                    }
                })(marker, i));

                }); 
                });
            }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7MdGSs4iqc07e8AL3pOfdgqVaIGLWaRw&callback=myMap"></script>

    </body>
</html>
