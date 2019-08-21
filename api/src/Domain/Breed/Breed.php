<?php
declare(strict_types=1);

namespace App\Domain\Breed;

use JsonSerializable;

class Breed implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $species_id;

    /**
     * @param int|null  $id
     * @param string    $name
     */
    public function __construct(?int $id, string $name, string $status, int $species_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->species_id = $species_id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return strtolower($this->name);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return strtolower($this->status);
    }

    /**
     * @return string
     */
    public function getSpeciesId(): string
    {
        return strtolower($this->species_id);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'species_id' => $this->species_id
        ];
    }
}
