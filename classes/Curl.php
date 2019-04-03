<?php
namespace stockScreenr;

class Curl {
    
    public static function request(string $url) {

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result = curl_exec($curl);

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if($httpCode != 200) {
            echo $httpCode;
        }

        curl_close($curl);

        $result = json_decode($result, true);

        if(empty($result)) {
            return array("message" => "No data found");
        }

        /*
         *   @returns array
         */
        
        return $result;
    }
}
?>