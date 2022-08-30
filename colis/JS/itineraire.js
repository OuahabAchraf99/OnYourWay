var directionsService, directionsDisplay, map, myLatLng

  function calcRoute(){
    console.log('calculating route...')
      var request = {
          origin: document.getElementById('it_from').value,
          destination: document.getElementById('it_to').value,
          travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
          unitSystem: google.maps.UnitSystem.METRIC //IMPERIAL
      }

      directionsService.route(request,
      function(result,status){
        console.log(result)
       if(status == google.maps.DirectionsStatus.OK){
          $("#output").html("<div class='alert-info'>From: "+document.getElementById("it_from").value+".<br/>To: "+document.getElementById("it_to").value+".<br/>Driving distance: "+result.routes[0].legs[0].distance.text+".<br/>Duration: " +result.routes[0].legs[0].duration.text+".</div>");

          $('#distance').val(result.routes[0].legs[0].distance.value)
           directionsDisplay.setDirections(result);

       }else{

           directionsDisplay.setDirections({routes:[]});

           map.setCenter(myLatLng);

           $("#output").html("<div class='alert-danger'>Could not retrive distance</div>");
       }
      });
  }
function init() {
  myLatLng = {lat: 44.8,lng: 20.5};
  var mapOptions = {
    center: myLatLng,
    zoom: 9,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

  console.log(map)
   directionsService = new google.maps.DirectionsService();

   directionsDisplay = new google.maps.DirectionsRenderer();

  directionsDisplay.setMap(map);


  var options = {
      types:['(cities)']
  }


  var input1 = document.getElementById("it_from");
  var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

  var input2 = document.getElementById("it_to");
  var autocomplete2 = new google.maps.places.Autocomplete(input2, options);

}
