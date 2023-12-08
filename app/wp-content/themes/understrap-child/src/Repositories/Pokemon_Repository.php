<?php
namespace App\Repositories;
use App\Interfaces\Repositories\Api_Repository_Interface;
use App\Repositories\Base_Api_Repository;

class Pokemon_Repository extends Base_Api_Repository implements Api_Repository_Interface {

    public string $url_service = "https://pokeapi.co/api/v2/";
    public function get_random_pokemon() : array {
        $result = $this->get('pokemon');
        $randomPokemonId = rand(1, $result['data']['count']);
        return $this->get('pokemon/'. $randomPokemonId);
    }

    public function get_pokemon_by_id(int $id) : array {
        return $this->get('pokemon/' . $id);
    }

    public function get_pokemon_by_name(string $name) : array {
        return $this->get('pokemon/' . $name);
    }
}