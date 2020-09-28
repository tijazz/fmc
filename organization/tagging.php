<?php
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
        #map {
            height: 100%;
        }
    </style>

</head>

<body>
    <?php
    $sql = "SELECT * from locations WHERE org_id =(:org_id) ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':org_id', $_SESSION['id'], PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    /* Fetch all of the remaining rows in the result set */
    $indexed = array_map('array_values', $results);
    //  $array = array_filter($indexed);

    if (!$results) {
        return null;
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw">
    </script>

    <div id="map"></div>
    <script>
        /**
         * Create new map
         */

        var infowindow;
        var map;
        var red_icon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
        var purple_icon = 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png';
        var locations = <?php echo json_encode($indexed); ?>;
        console.log(locations)
        var myOptions = {
            zoom: 6,
            center: new google.maps.LatLng(9.081999, 8.675277),
            mapTypeId: 'roadmap'
        };
        map = new google.maps.Map(document.getElementById('map'), myOptions);

        /**
         * Global marker object that holds all markers.
         * @type {Object.<string, google.maps.LatLng>}
         */
        var markers = {};

        /**
         * Concatenates given lat and lng with an underscore and returns it.
         * This id will be used as a key of marker to cache the marker in markers object.
         * @param {!number} lat Latitude.
         * @param {!number} lng Longitude.
         * @return {string} Concatenated marker id.
         */
        var getMarkerUniqueId = function(lat, lng) {
            return lat + '_' + lng;
        };

        /**
         * Creates an instance of google.maps.LatLng by given lat and lng values and returns it.
         * This function can be useful for getting new coordinates quickly.
         * @param {!number} lat Latitude.
         * @param {!number} lng Longitude.
         * @return {google.maps.LatLng} An instance of google.maps.LatLng object
         */
        var getLatLng = function(lat, lng) {
            return new google.maps.LatLng(lat, lng);
        };

        /**
         * Binds click event to given map and invokes a callback that appends a new marker to clicked location.
         */



        /**
         * Binds  click event to given marker and invokes a callback function that will remove the marker from map.
         * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
         */
        var bindMarkerinfo = function(marker) {
            google.maps.event.addListener(marker, "click", function(point) {
                var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                var marker = markers[markerId]; // find marker
                infowindow = new google.maps.InfoWindow();
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
                // removeMarker(marker, markerId); // remove it
            });
        };






        /**
         * loop through (Mysql) dynamic locations to add markers to map.
         */
        var i;
        var confirmed = 0;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][4], locations[i][5]),
                map: map,
                icon: red_icon,
                html: "<div id='display'><p><b> " + locations[i][3] + " </b><br><i>  " + locations[i][6] + " </i></p></div>"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();
                    $("#display").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>



</body>

</html>