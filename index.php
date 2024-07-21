<?php

// Base URL for Telegram API
$telegramApiBaseUrl = 'https://api.telegram.org/';

// Extract the requested URI path
$requestUri = $_SERVER['REQUEST_URI'];

// Ensure that the base path is handled correctly
$basePath = '/';
$relativePath = ltrim($requestUri, $basePath); // Remove leading slash

// Build the full Telegram API URL
$telegramApiUrl = $telegramApiBaseUrl . $relativePath;

// Initialize cURL session
$ch = curl_init($telegramApiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_SERVER['REQUEST_METHOD']); // GET, POST, etc.

// Forward the request data to Telegram only for POST, PUT, and DELETE methods
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = file_get_contents('php://input');

    // Set cURL options for POST data
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
    
    // Set the appropriate headers for JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($requestData)
    ]);
}

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo json_encode(['error' => curl_error($ch)]);
}

// Close cURL session
curl_close($ch);

// Set response headers
header('Content-Type: application/json');

// Output the response from Telegram
echo $response;
?>

