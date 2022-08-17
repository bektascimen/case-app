<?php

namespace App\Traits;

use App\Repositories\RepositoryInterfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository;

trait TaskRepositoryTrait
{
    /** @var TaskRepositoryInterface */
    private $taskRepository;

    /**
     * @return TaskRepositoryInterface
     */
    public function getTaskRepository(): TaskRepositoryInterface
    {
        if (!$this->taskRepository) {
            $this->setTaskRepository(new TaskRepository());
        }

        return $this->taskRepository;
    }

    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function setTaskRepository(TaskRepositoryInterface $taskRepository): void {
        $this->taskRepository = $taskRepository;
    }
}
