<?php

namespace App\Traits;

use App\Services\TaskService;

trait TaskServiceTrait
{
    /** @var TaskService */
    private $taskService;

    public function getTaskService(): TaskService
    {
        if (!$this->taskService) {
            $this->taskService = new TaskService();
        }

        return $this->taskService;
    }
}
