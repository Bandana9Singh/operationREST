<?php
/* fetch data from front end .
   No header given */


        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"url");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_GET, 1);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);       
        curl_close($ch);
        echo $output;
?>
