<?php



$xml_data='<ApplicationServer xmlns="http://com/example">
    <key1>val</key1>
    <key1>val</key1>
    <key1>val</key1>
    
    <Key4>
        <Key4.1>val</Key4.1>
        <Key4.2>
            <Key4.2.1>val</Key4.2.1>
            <Key4.2.2>val</Key4.2.2>
        </Key4.2>
       <Key4.3>
            <Key4.3.1>val</Key4.3.1>
            <Key4.3.2>val</Key4.3.2>
        </Key3.2>
    </Key4>
</ApplicationServer>';



echo $xml_data;
$username='admin';
$password='admin';
$url = 'url';
$ch = curl_init($url);
//echo "Sleeping for 5 secs";
//sleep(5);
$passwordStr = "$username:$password";
$successCode = 201;

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_USERPWD, $passwordStr);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/vnd.yang.data+xml'));
//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic " .base64_encode($username . ":" . $password)));
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);

$buffer = curl_exec($ch);
$info = curl_getinfo($ch);
print_r($info);
$xml = simplexml_load_string($buffer);
$json=json_encode($xml);

        print_r('<pre>');
        print_r($json);
        print_r('</pre>');

if ($info['http_code'] != $successCode) {
    $returnVal = "0";
} else {
$returnVal = $json;
}

curl_close($ch);

echo $returnVal;

?>
