<?php
declare(strict_types=1);

namespace App\Application\Actions\Breed;

use Psr\Http\Message\ResponseInterface as Response;

class ListBreedAction extends BreedAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $breed = $this->BreedRepository->index();

        $this->logger->info("Breeds list was viewed.");

        return $this->respondWithData($breed);
    }
}
