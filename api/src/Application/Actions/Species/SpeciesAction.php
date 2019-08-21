<?php
declare(strict_types=1);

namespace App\Application\Actions\Species;

use App\Application\Actions\Action;
use App\Domain\Species\SpeciesRepository;
use Psr\Log\LoggerInterface;

abstract class SpeciesAction extends Action
{
    /**
     * @var SpeciesRepository
     */
    protected $SpeciesRepository;

    /**
     * @param LoggerInterface $logger
     * @param SpeciesRepository  $SpeciesRepository
     */
    public function __construct(LoggerInterface $logger, SpeciesRepository $SpeciesRepository)
    {
        parent::__construct($logger);
        $this->SpeciesRepository = $SpeciesRepository;
    }
}
