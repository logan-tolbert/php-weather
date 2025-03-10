<?php
namespace Lodev\PhpWeather\api;

require '../../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();


// API key for OpenWeatherMap
// You can get your own API key by signing up at https://openweathermap
$API_KEY = $_ENV['OPENWEATHERMAP_API_KEY'];
$BASE_URL = "https://api.openweathermap.org/data/2.5/weather";
// Latitude and Longitude of Atlanta,Georgia
$LAT = 33.7490;
$LON = -84.3880;
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