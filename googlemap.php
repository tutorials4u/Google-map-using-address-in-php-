 <?php
 $Address = "Chandiagrh, chandigarh, uganda";
  $Address = urlencode($Address);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $Lat = $xml->result->geometry->location->lat;
      $Lon = $xml->result->geometry->location->lng;
       $LatLng = "$Lat,$Lon";
  }

?>
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
var myCenter=new google.maps.LatLng(<?php echo $Lat;?>,<?php echo $Lon;?>);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="googleMap" style="height:500px ;width:100%; border: 1px solid #333;margin-top: 1.6em;"></div>
