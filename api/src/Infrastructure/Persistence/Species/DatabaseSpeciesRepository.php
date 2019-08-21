<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Species;

use App\Domain\Species\Species;
use App\Domain\Species\SpeciesNotFoundException;
use App\Domain\Species\SpeciesRepository;
use App\Infrastructure\Persistence\PDOConnection;

class DatabaseSpeciesRepository extends PDOConnection implements SpeciesRepository 
{
    /**
     * @var Species[]
     */
    private $species;

    /**
     * DatabaseSpeciesRepository constructor.
     *
     * @param array|null $species
     */
    public function __construct(array $species = null)
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function index(): array
    {
        return $this->pdo->query("SELECT * FROM species_view")->fetchAll();
    }

    /**
     * {@inheritdoc}
     */
    public function find(int $id): Species
    {
        if (!isset($this->species[$id])) {
            throw new SpecieNotFoundException();
        }

        return $this->species[$id];
    }
}
