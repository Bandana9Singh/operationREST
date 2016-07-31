<?php
$successCode = 200;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://maps.google.com/maps/api/geocode/json?address=delhi&sensor=false");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       
$buffer = curl_exec($ch);
$info = curl_getinfo($ch,CURLINFO_HTTP_CODE);
$json=json_decode($buffer,true);

$users=$json['results'];
foreach($users as $i){
$k= $i['address_components'];
	foreach($k as $j){
	   print_r($j['long_name']);
		echo "\t";
	   print_r($j['short_name']);	
	   foreach($j['types'] as $m){
	      echo "\t";
		   print_r($m);
		    
	    }
	   echo '<br/>';
	}	
}
	
if ($info!= $successCode) {
    $returnVal = "false";
} else {
$returnVal = "true";
}
echo $returnVal;
curl_close($ch);
?>




