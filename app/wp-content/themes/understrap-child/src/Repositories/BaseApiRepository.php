<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

abstract class BaseApiRepository {

    protected $client;

    public function __construct(public string $url_service) {
        $this->client = new Client();
    }

    public function get(): array
    {
        try {
            $response = $this->client->get($this->url_service);
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