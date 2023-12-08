<?php

use App\Services\Pokemon\Get_Pokemon_From_Api_Service;
use PHPUnit\Framework\TestCase;

class Get_Pokemon_From_API_Service_Test extends TestCase {
    public function test_get_pokemon_from_api () {
        $service = new Get_Pokemon_From_Api_Service;
        $result = $service->handle('charizard');

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('message', $result);
    }
}