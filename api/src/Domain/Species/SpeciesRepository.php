<?php
declare(strict_types=1);

namespace App\Domain\Species;

interface SpeciesRepository
{
    /**
     * @return Species[]
     */
    public function index(): array;
}
