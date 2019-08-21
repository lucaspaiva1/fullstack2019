<?php
declare(strict_types=1);

use App\Domain\Pet\PetRepository;
use App\Domain\Species\SpeciesRepository;
use App\Domain\Breed\BreedRepository;
use App\Infrastructure\Persistence\Pet\DatabasePetRepository;
use App\Infrastructure\Persistence\Species\DatabaseSpeciesRepository;
use App\Infrastructure\Persistence\Breed\DatabaseBreedRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our PetRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        PetRepository::class => \DI\autowire(DatabasePetRepository::class),
        SpeciesRepository::class => \DI\autowire(DatabaseSpeciesRepository::class),
        BreedRepository::class => \DI\autowire(DatabaseBreedRepository::class),
    ]);
};
