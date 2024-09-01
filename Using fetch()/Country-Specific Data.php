<?php
// Country code or name
$country = 'USA'; // Example: 'USA', 'India', 'Brazil'
// API URL for country-specific COVID-19 statistics
$apiUrl = "https://corona.lmao.ninja/v3/covid-19/countries/$country";
// Initialize cURL session
$ch = curl_init();
// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute cURL request
$response = curl_exec($ch);
// Check for cURL errors
if (curl_errno($ch)) {
    die('cURL error: ' . curl_error($ch));
}
// Close cURL session
curl_close($ch);

// Decode JSON response
$data = json_decode($response, true);
// Check for JSON decode errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}
// Display data





/**
 * Extracts specific keys from an array.
 *
 * @param array $array The input array.
 * @param array $keys The keys to extract.
 * @return array An array with the extracted values.
 */
function array_extract(array $array, array $keys): array {
    $result = [];
    foreach ($keys as $key) {
        if (array_key_exists($key, $array)) {
            $result[$key] = $array[$key];
        }
    }
    return $result;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Statistics for <?php echo htmlspecialchars($country); ?></title>
</head>
<body>
    <h1>COVID-19 Statistics for <?php echo htmlspecialchars($country); ?></h1>
    <p>Total Cases: <?php echo number_format($data['cases']); ?></p>
    <p>Total Deaths: <?php echo number_format($data['deaths']); ?></p>
    <p>Total Recovered: <?php echo number_format($data['recovered']); ?></p>
</body>
</html>


