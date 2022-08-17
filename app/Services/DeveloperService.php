<?php

namespace App\Services;

use App\Traits\DeveloperRepositoryTrait;

class DeveloperService extends AbstractService
{
    use DeveloperRepositoryTrait;

    public function getDevelopers(): array
    {
        return $this->getDeveloperRepository()->getDevelopers();
    }
}
