
<?php
/*
Plugin Name: Météo
Description: quel tempps ?
Author: Yoann
*/
function meteo(){
  $curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?q=mende&appid=5f65e85f5078cf5d30c9413ea8dd1e79&lang=fr",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
  "cache-control: no-cache"
),
));

$response = curl_exec($curl);
$response = json_decode($response, true); //because of true, it's in an array
//var_dump($response);
$r=$response["weather"][0]["description"];
echo "Aujourd'hui à Prévenchères le temps est: $r";
}

add_action( 'wp_footer', 'meteo' );
?>

