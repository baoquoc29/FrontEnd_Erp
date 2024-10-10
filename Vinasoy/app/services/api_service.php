<?php
// services/api_service.php


class ApiService {
    public function get($endpoint) {
        return apiGetRequest($endpoint);
    }

    public function post($endpoint, $data) {
        return apiPostRequest($endpoint, $data);
    }

    public function put($endpoint, $data) {
        return apiPutRequest($endpoint, $data);
    }

    public function delete($endpoint) {
        return apiDeleteRequest($endpoint);
    }
}
