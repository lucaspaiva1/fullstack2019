<?php

declare(strict_types=1);

namespace App\Application\Actions\Pet;

use Psr\Http\Message\ResponseInterface as Response;

class StorePetAction extends PetAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $json = $this->request->getParsedBody();
        $response = $this->PetRepository->store(
            $json['name'],
            $json['gender'],
            (int) $json['breed_id'],
            $json['born_at']
        );
        $this->logger->info("Pets list was stored.");
        return $this->respondWithData($response);
    }
}
