<?php

declare(strict_types=1);

namespace App\Application\Actions\Pet;

use Psr\Http\Message\ResponseInterface as Response;

class ViewPetAction extends PetAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $petId = (int) $this->resolveArg('id');
        $pet = $this->PetRepository->find($petId);

        $this->logger->info("Pet of id `${petId}` was viewed.");

        return $this->respondWithData($pet);
    }
}
