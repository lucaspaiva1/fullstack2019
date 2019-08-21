<?php

declare(strict_types=1);

namespace App\Domain\Pet;

interface PetRepository
{
    /**
     * @return Pet[]
     */
    public function index(): array;

    /**
     * @param int $id
     * @return Pet
     * @throws PetNotFoundException
     */
    public function find(int $id): Pet;

    /**
     * @param string $name
     * @param string $gender
     * @param int $breed_id
     * @param string $born_at
     * @return Bool
     */
    public function store(string $name, string $gender, int $breed_id, string $born_at): Bool;

    /**
     * @param string $id
     * @param string $name
     * @param string $gender
     * @param int $breed_id
     * @param string $born_at
     * @param string $died_at
     * @return Bool
     */
    public function update(int $id, string $name, string $gender, int $breed_id, string $born_at, ?string $died_at): Bool;
}
