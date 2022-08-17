<?php

namespace App\Traits;

use App\Services\DeveloperService;

trait DeveloperServiceTrait
{
    /** @var DeveloperService */
    private $developerService;

    public function getDeveloperService(): DeveloperService
    {
        if (!$this->developerService) {
            $this->developerService = new DeveloperService();
        }

        return $this->developerService;
    }
}
