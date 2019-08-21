<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Pet;

use App\Domain\Pet\Pet;
use App\Domain\Pet\PetNotFoundException;
use App\Domain\Pet\PetRepository;
use App\Infrastructure\Persistence\DatabaseException;
use App\Infrastructure\Persistence\PDOConnection;
use phpDocumentor\Reflection\Types\Boolean;

class DatabasePetRepository extends PDOConnection implements PetRepository
{
    /**
     * @var Pet[]
     */
    private $pets;

    /**
     * DatabasePetRepository constructor.
     *
     * @param array|null $pets
     */
    public function __construct(array $pets = null)
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function index(): array
    {
        return $this->pdo->query("SELECT * FROM pets_view")->fetchAll();
    }

    /**
     * {@inheritdoc}
     */
    public function find(int $id): Pet
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pets_view WHERE id=?");
        $stmt->execute([$id]);
        $pet = $stmt->fetch();
        if (!$pet) {
            throw new PetNotFoundException();
        }
        return new Pet(
            (int) $pet["id"],
            $pet["name"],
            $pet["gender"],
            (int) $pet["breed_id"],
            $pet["born_at"],
            $pet["died_at"],
            $pet["age"],
            $pet["breed"],
            $pet["species"],
            $pet["species_id"],
            $pet["updated_at"]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function store(string $name, string $gender, int $breed_id, string $born_at): Bool
    {
        $stmt = $this->pdo->prepare('CALL sp_create_pet(?, ?, ?, ?)');

        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $breed_id);
        $stmt->bindParam(3, $gender);
        $stmt->bindParam(4, $born_at);

        $stmt->execute();

        $response = $stmt->fetch();

        if (!$response['status']) {
            throw new DatabaseException($response['message']);
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function update(int $id, string $name, string $gender, int $breed_id, string $born_at, ?string $died_at): Bool
    {

        $stmt = $this->pdo->prepare('CALL sp_update_pet(?, ?, ?, ?, ?, ?)');

        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $breed_id);
        $stmt->bindParam(4, $gender);
        $stmt->bindParam(5, $born_at);
        $stmt->bindParam(6, $died_at);

        $stmt->execute();

        $response = $stmt->fetch();

        if (!$response['status']) {
            throw new DatabaseException($response['message']);
        }

        return true;

    }
}
