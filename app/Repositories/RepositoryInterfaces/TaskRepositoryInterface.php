<?php

namespace App\Repositories\RepositoryInterfaces;

interface TaskRepositoryInterface
{
    public function getTasks(): array;

    public function saveProviderOneTasks(array $data): void;

    public function saveProviderTwoTasks(array $data): void;
}
