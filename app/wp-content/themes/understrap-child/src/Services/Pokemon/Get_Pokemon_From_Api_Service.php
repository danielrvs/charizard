<?php

namespace App\Services\Pokemon;

use App\Repositories\Pokemon_Repository;

class Get_Pokemon_From_Api_Service
{
    
    public Pokemon_Repository $pokemon_repository;
    public function __construct()
    {
        $this->pokemon_repository = new Pokemon_Repository;
    }

    /**
     *  @return array{data: array, message: string}
     */

    public function handle(int|string $id_or_name): array
    {
        $result = [];
        
        if(is_int($id_or_name)) {
            $result = $this->pokemon_repository->get_pokemon_by_id($id_or_name); 
        } else if(is_string($id_or_name)) {
            $result = $this->pokemon_repository->get_pokemon_by_name($id_or_name);
        }

        return $result;
    }
}
