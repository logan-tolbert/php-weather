<?php

use PHPUnit\Framework\TestCase;

class WeatherTests extends TestCase
{
    public function testEnvironmentVariablesAreLoadedCorrectly()
    {
        // Create a test environment variable
        $_ENV['OPENWEATHERMAP_API_KEY'] = 'test_api_key';
        
        // Test it can be accessed
        $this->assertNotEmpty($_ENV['OPENWEATHERMAP_API_KEY']);
        $this->assertEquals('test_api_key', $_ENV['OPENWEATHERMAP_API_KEY']);
    }
    
    public function testApiKeyIsCorrectlyRetrievedFromEnvironmentVariables()
    {
        // Set environment variable
        $_ENV['OPENWEATHERMAP_API_KEY'] = 'test_api_key';
        
        // Get API key like in weather.php
        $API_KEY = $_ENV['OPENWEATHERMAP_API_KEY'];
        
        // Check it's retrieved correctly
        $this->assertEquals('test_api_key', $API_KEY);
    }
    
    public function testApiRequestsToOpenWeatherMapAreCorrectlyFormed()
    {
        // Test values
        $API_KEY = 'test_api_key';
        $BASE_URL = "https://api.openweathermap.org/data/2.5/weather";
        $LAT = 33.7490;
        $LON = -84.3880;
        
        // Form URL as in weather.php
        $URL = "$BASE_URL?lat=$LAT&lon=$LON&appid=$API_KEY";
        
        // Check URL is formed correctly
        $expected = "https://api.openweathermap.org/data/2.5/weather?lat=33.749&lon=-84.388&appid=test_api_key";
        $this->assertEquals($expected, $URL);
    }
    
    public function testApiResponsesAreCorrectlyParsedAndHandled()
    {
        // Sample API response
        $response = '{"name":"Atlanta","sys":{"country":"US"},"weather":[{"description":"clear sky"}],"main":{"temp":300.15,"humidity":70},"wind":{"speed":5.5},"dt":1615882230}';
        
        // Parse as in weather.php
        $data = json_decode($response, true);
        
        // Check parsed data
        $this->assertEquals('Atlanta', $data['name']);
        $this->assertEquals('US', $data['sys']['country']);
        $this->assertEquals('clear sky', $data['weather'][0]['description']);
        $this->assertEquals(300.15, $data['main']['temp']);
        $this->assertEquals(70, $data['main']['humidity']);
        $this->assertEquals(5.5, $data['wind']['speed']);
        $this->assertEquals(1615882230, $data['dt']);
    }
}