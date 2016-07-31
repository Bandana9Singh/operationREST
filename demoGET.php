<?php
$successCode = 200;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://maps.google.com/maps/api/geocode/json?address=delhi&sensor=false");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       
$buffer = curl_exec($ch);
$info = curl_getinfo($ch,CURLINFO_HTTP_CODE);
// print_r($buffer);

//$xml = simplexml_load_string($buffer);
//echo $xml;
$json=json_decode($buffer,true);
//   print_r($json);

$users=$json['results'];
//print_r($users);
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

curl_close($ch);

echo $returnVal;



/*if ( $httpCode != 200 ){
    echo "Return code is {$httpCode} \n"
        .curl_error($ch);
} else {
    echo "<pre>".htmlspecialchars($response)."</pre>";
}

curl_close($ch);*/
?>




