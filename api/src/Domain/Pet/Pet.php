<?php

declare(strict_types=1);

namespace App\Domain\Pet;

use JsonSerializable;

class Pet implements JsonSerializable
{
    public $id;
    public $name;
    public $gender;
    public $born_at;
    public $died_at;
    public $age;
    public $breed;
    public $breed_id;
    public $species;
    public $species_id;
    public $updated_at;

    public function __construct(?int $id, string $name, string $gender, int $breed_id, string $born_at, ?string $died_at = null, $age = null, $breed = null, $species = null, $species_id = null, $updated_at = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->gender = $gender;
        $this->born_at = $born_at;
        $this->died_at = $died_at;
        $this->age = $age;
        $this->breed = $breed;
        $this->breed_id = $breed_id;
        $this->species = $species;
        $this->species_id = $species_id;
        $this->updated_at = $updated_at;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'gender' => $this->gender,
            'born_at' => $this->born_at,
            'died_at' => $this->died_at,
            'age' => $this->age,
            'breed' => $this->breed,
            'breed_id' => $this->breed_id,
            'species' => $this->species,
            'species_id' => $this->species_id,
            'updated_at' => $this->updated_at
        ];
    }
}
