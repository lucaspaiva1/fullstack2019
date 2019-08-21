<?php
declare(strict_types=1);

namespace App\Domain\Breed;

interface BreedRepository
{
    /**
     * @return Breed[]
     */
    public function index(): array;
}
