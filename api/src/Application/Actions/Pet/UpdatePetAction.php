<?php

declare(strict_types=1);

namespace App\Application\Actions\Pet;

use Psr\Http\Message\ResponseInterface as Response;

class UpdatePetAction extends PetAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $petId = (int) $this->resolveArg('id');

        $json = $this->request->getParsedBody();

        $response = $this->PetRepository->update(
            $petId,
            $json['name'],
            $json['gender'],
            (int) $json['breed_id'],
            $json['born_at'],
            $json['died_at']
        );

        return $this->respondWithData($response);
    }
}
