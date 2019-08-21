<?php
declare(strict_types=1);

namespace App\Domain\Species;

use App\Domain\DomainException\DomainRecordNotFoundException;

class SpeciesNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The species you requested does not exist.';
}
