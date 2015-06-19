

<?php

 $username = 'http-auth-username';
 $password = 'http-auth-password';
$process = curl_init("url");

$headers = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "Authorization: Basic " .base64_encode($username . ":" . $password)
 );
/* Send data in XML form
 $xml_data ='<AATAvailReq1>'.
    '<Agency>'.
        '<Iata>1234567890</Iata>'.
        '<Agent>lgsoftwares</Agent>'.
        '<Password>mypassword</Password>'.
        '<Brand>phpmind.com</Brand>'.
    '</Agency>'.
    '<Passengers>'.
        '<Adult AGE="" ID="1"></Adult>'.
        '<Adult AGE="" ID="2"></Adult>'.
    '</Passengers>'.
'<HotelAvailReq1>'.
'<DestCode>JHM</DestCode>'.
        '<HotelCode>OGGSHE</HotelCode>'.
        '<CheckInDate>101009</CheckInDate>'.
        '<CheckOutDate>101509</CheckOutDate>'.
        '<UseField>1</UseField>'.
  '</HotelAvailReq1>'.  
  '</AATAvailReq1>';
*/
// For post request
$attachment =  array(
'access_token' => $token,
'message' => $msg,
'name' => $title,
'link' => $uri,
'description' => $desc,
'picture'=>$pic,
'actions' => json_encode(array('name' => $action_name,'link' => $action_link))
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
curl_setopt($process, CURLOPT_HEADER, 1);
//curl_setopt($process, CURLOPT_USERPWD, admin . ":" .admin );
curl_setopt($process, CURLOPT_TIMEOUT, 30);
curl_setopt($process, CURLOPT_POST, 1);
curl_setopt($process, CURLOPT_POSTFIELDS, $attachment);
curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
$return = curl_exec($process);
curl_close($process);

?>
