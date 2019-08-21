<?php
declare(strict_types=1);

namespace App\Application\Actions\Species;

use Psr\Http\Message\ResponseInterface as Response;

class ListSpeciesAction extends SpeciesAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $species = $this->SpeciesRepository->index();

        $this->logger->info("Species list was viewed.");

        return $this->respondWithData($species);
    }
}
