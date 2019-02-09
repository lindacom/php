    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of peru
  var peru = {lat: -12.0463731, lng: -77.042754};
  // The map, centered at peru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: peru});
  // The marker, positioned at peru
  var marker = new google.maps.Marker({position: peru, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzEYM3NsMbKzVKKYKYOEE25pwiNFpjP6A&callback=initMap">
    </script>
