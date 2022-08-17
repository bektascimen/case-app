<?php

namespace App\Traits;

use App\Repositories\DeveloperRepository;
use App\Repositories\RepositoryInterfaces\DeveloperRepositoryInterface;

trait DeveloperRepositoryTrait
{
    /** @var DeveloperRepositoryInterface */
    private $developerRepository;

    /**
     * @return DeveloperRepositoryInterface
     */
    public function getDeveloperRepository(): DeveloperRepositoryInterface
    {
        if (!$this->developerRepository) {
            $this->setDeveloperRepository(new DeveloperRepository());
        }

        return $this->developerRepository;
    }

    /**
     * @param DeveloperRepositoryInterface $developerRepository
     */
    public function setDeveloperRepository(DeveloperRepositoryInterface $developerRepository): void {
        $this->developerRepository = $developerRepository;
    }
}
