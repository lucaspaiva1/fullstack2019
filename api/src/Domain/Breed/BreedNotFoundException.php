<?php
declare(strict_types=1);

namespace App\Domain\Breed;

use App\Domain\DomainException\DomainRecordNotFoundException;

class BreedNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The breed you requested does not exist.';
}
