<?php
declare(strict_types=1);

namespace App\Application\Actions\Pet;

use Psr\Http\Message\ResponseInterface as Response;

class ListPetsAction extends PetAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $pets = $this->PetRepository->index();

        $this->logger->info("Pets list was viewed.");
        
        return $this->respondWithData($pets);
    }
}
