<?php
use App\Services\Pokemon\GetPokemonFromApiService;
use PHPUnit\Framework\TestCase;

class GetPokemonFromAPIServiceTest extends TestCase {
    public function test_get_pokemon_from_api () {
        $service = new GetPokemonFromApiService;
        $result = $service->handle();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('message', $result);
    }
}