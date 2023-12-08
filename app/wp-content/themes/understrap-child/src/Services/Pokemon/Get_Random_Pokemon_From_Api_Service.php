<?php

namespace App\Services\Pokemon;

use App\Repositories\Pokemon_Repository;

class Get_Random_Pokemon_From_Api_Service
{
    public Pokemon_Repository $pokemon_repository;
    public function __construct()
    {
        $this->pokemon_repository = new Pokemon_Repository;
    }
    /**
     *  @return array{data: array, message: string}
     */
    public function handle(): array
    {
        return $this->pokemon_repository->get_random_pokemon();
    }
}
