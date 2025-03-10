<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Weather</title>
    <link rel="stylesheet" href="assets/style/styles.css">
</head>
<body>
    <img src="assets/images/cloud.png" alt="Weather Icon">
    <h1>PHP Weather</h1>
  
    <p>Enter a city & state name to get the current weather:</p>
    <!-- TODO: Add form functionality for dynamic latitude and longitude input. -->
    <form action="api/weather.php" method="get">
        <input type="text" name="city" placeholder="City" disabled>
        <input type="text" name="state" placeholder="Country" disabled>
        <div class="button-group">
            <button type="submit">Get Weather</button>
            <button type="reset">Reset</button>
            <button type="button" onclick="window.location.href='index.php'">Clear</button> 
        </div>
    </form>
    <div class="weather-info">
        <h3>Details:</h3>    
        <p>City: <?php echo htmlspecialchars($_GET['city'] ?? ''); ?></p>
        <p>Country: <?php echo htmlspecialchars($_GET['country'] ?? ''); ?></p>
        <p>Current Weather: <?php echo htmlspecialchars($_GET['weather'] ?? ''); ?></p>
        <p>Temperature: <?php echo htmlspecialchars($_GET['temp'] ?? ''); ?> °F</p>
        <p>Humidity: <?php echo htmlspecialchars($_GET['humidity'] ?? ''); ?> %</p>
        <p>Wind Speed: <?php echo htmlspecialchars($_GET['wind'] ?? ''); ?> m/s</p>
        <p>Last Updated: <?php echo htmlspecialchars($_GET['last_updated'] ?? ''); ?></p>
    </div>
    
    <!-- Temporary link to fetch weather data -->
    <p><a href="api/weather.php">Fetch Weather Data</a></p>
</body>
</html>