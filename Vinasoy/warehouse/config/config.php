<?php
define('API_BASE_URL', 'http://localhost:8082/');

function apiGetRequest($endpoint) {
    $url = API_BASE_URL . $endpoint;
    $response = file_get_contents($url);
    
    if ($response === FALSE) {
        return null; 
    }
    
    return json_decode($response, true);
}

function apiPostRequest($endpoint, $data) {
    $url = API_BASE_URL . $endpoint;
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    if ($response === FALSE) {
        return null; // Xử lý lỗi nếu có
    }
    
    return json_decode($response, true);
}

// Hàm PUT
function apiPutRequest($endpoint, $data) {
    $url = API_BASE_URL . $endpoint;
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    if ($response === FALSE) {
        return null; // Xử lý lỗi nếu có
    }
    
    return json_decode($response, true);
}

// Hàm DELETE
function apiDeleteRequest($endpoint) {
    $url = API_BASE_URL . $endpoint;
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    if ($response === FALSE) {
        return null; // Xử lý lỗi nếu có
    }
    
    return json_decode($response, true);
}
