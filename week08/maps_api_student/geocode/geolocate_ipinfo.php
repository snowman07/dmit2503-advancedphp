<!DOCTYPE html>  
<html>  
<head> 
<title>GeoLocate</title> 
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #map_canvas { 
  height: 400px; 
  width: 400px; 
  }
</style>
 
   </head>  
   <body>  
    <div>  
       <?php
	   
	   $ip = $_SERVER['REMOTE_ADDR'];
	   echo "IP: " . $ip;
	   //$ip = "22.231.113.64"; test for known value; NAIT IP's don't work !
			if ($ip != "::1"){ // ::1 is localhost
                            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

                            $country =  $details->country; 
                            $prov =  $details->region; 
                            $city =  $details->city;

                            $coords = explode(",",$details->loc);
                            $lat = $coords[0];
                            $lng = $coords[1];	

                     echo "<p>$country | $prov |  $city |  $lat |  $lng </p>";   
                            
			}
	   
	   ?>
	   
	   
	   
     </div> 
      <div id="map_canvas"></div>
 
   </body>  
 </html>  