<?php

function auth($clientId, $clientSecret, $baseUrl = "https://auth.justwaitforme.de")
{
    $credentials = base64_encode($clientId . ':' . $clientSecret);
    $url = $baseUrl . '/api?client=' . $credentials;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Add this line to follow redirects

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo $response;
    die;
    if ($httpCode == 200) {
        $responseData = json_decode($response, true);
        return $responseData["token"];
    } elseif ($httpCode == 401) {
        $redirectUrl = $baseUrl . '?client=' . $credentials;
        header('Location: ' . $redirectUrl);
        exit;
    } elseif ($httpCode == 301) { // Add this block to handle 301 redirects
        $newUrl = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
        return auth($clientId, $clientSecret, $newUrl); // Recursively call the auth function with the new URL
    } else {
        return false;
    }
}
