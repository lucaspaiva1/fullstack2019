<?php
declare(strict_types=1);

namespace App\Application\Actions\Breed;

use App\Application\Actions\Action;
use App\Domain\Breed\BreedRepository;
use Psr\Log\LoggerInterface;

abstract class BreedAction extends Action
{
    /**
     * @var BreedRepository
     */
    protected $BreedRepository;

    /**
     * @param LoggerInterface $logger
     * @param BreedRepository  $BreedRepository
     */
    public function __construct(LoggerInterface $logger, BreedRepository $BreedRepository)
    {
        parent::__construct($logger);
        $this->BreedRepository = $BreedRepository;
    }
}
