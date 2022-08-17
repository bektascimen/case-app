<?php

namespace App\Repositories;

use App\Models\Developer;
use App\Repositories\RepositoryInterfaces\DeveloperRepositoryInterface;

class DeveloperRepository extends BaseRepository implements DeveloperRepositoryInterface
{
    public function getDevelopers(): array
    {
        return Developer::all()->toArray();
    }
}
