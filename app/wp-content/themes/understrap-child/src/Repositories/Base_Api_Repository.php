<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

abstract class Base_Api_Repository {

    protected Client $client;
    public string $url_service = '';

    public function __construct() {
        $this->client = new Client();
    }

    public function get(string $query = ''): array
    {
        $this->isThereUrlService();
        try {
            $url = $this->url_service . '/' . ltrim($query, '/');
            $response = $this->client->get($url);
            return $this->successResponse(
                json_decode($response->getBody(), true),
                $response->getStatusCode()
            );
        } catch (RequestException $e) {
            return $this->errorResponse(
                $e->getCode() ?? null,
                $e->getMessage() ?? null
            );
        }
    }

    protected function isThereUrlService() :void
    {
        if(empty($this->url_service)) throw new \Exception('You have to specify the URL for the API Service');
    }

    protected function successResponse(array $data, ?int $code = 200, ?string $message = "Data retrieved successfully"): array {
        return [
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'code' => $code,
        ];
    }

    protected function errorResponse(?int $code = 500, ?string $message = "Can't access the API"): array {
        return [
            'status' => 'error',
            'message' => $message,
            'data' => [],
            'code' => $code,
        ];
    }
}