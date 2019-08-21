<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Breed;

use App\Domain\Breed\Breed;
use App\Domain\Breed\BreedNotFoundException;
use App\Domain\Breed\BreedRepository;
use App\Infrastructure\Persistence\PDOConnection;

class DatabaseBreedRepository extends PDOConnection implements BreedRepository 
{
    /**
     * @var Breed[]
     */
    private $breed;

    /**
     * DatabaseBreedRepository constructor.
     *
     * @param array|null $breed
     */
    public function __construct(array $breed = null)
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function index(): array
    {
        return $this->pdo->query("SELECT * FROM breeds_view")->fetchAll();
    }

    /**
     * {@inheritdoc}
     */
    public function find(int $id): Breed
    {
        if (!isset($this->breed[$id])) {
            throw new SpecieNotFoundException();
        }

        return $this->breed[$id];
    }
}
