<?php
namespace Lodev\PhpWeather\api;

require '../../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$API_KEY = $_ENV['OPENWEATHERMAP_API_KEY'];

// -- get lat and long by city and country writed in form
$city = $_GET['city'];
$country = $_GET['country'];
$latLongUrl = "https://api.openweathermap.org/geo/1.0/direct?q=".$city.",".$country."&limit=1&appid=".$API_KEY;
$searchLatLon = file_get_contents($latLongUrl);
if ($searchLatLon === FALSE) {
    die('Error occurred');
}
$searchLatLon = json_decode($searchLatLon)[0];
$LAT = $searchLatLon->lat;
$LON = $searchLatLon->lon;

// -- get weather informations
$BASE_URL = "https://api.openweathermap.org/data/2.5/weather";
$URL = "$BASE_URL?lat=$LAT&lon=$LON&appid=$API_KEY";


$response = file_get_contents($URL);
if ($response === FALSE) {
    die('Error occurred');
}

$data = json_decode($response, true);
$city = $data['name'];
$country = $data['sys']['country'];
$weather = $data['weather'][0]['description'];
$temp = number_format(($data['main']['temp'] - 273.15) * 9/5 + 32, 2);
$humidity = $data['main']['humidity'];
$wind = $data['wind']['speed'];
// TODO: Convert the timestamp to a human-readable format
$last_updated = date('Y-m-d H:i:s', $data['dt']);


header("Location: ../index.php?city=" . urlencode($city) . "&country=" . urlencode($country) . "&weather=" . urlencode($weather) . "&temp=" . urlencode($temp) . "&humidity=" . urlencode($humidity) . "&wind=" . urlencode($wind) . "&last_updated=" . urlencode($last_updated));
exit();
?>