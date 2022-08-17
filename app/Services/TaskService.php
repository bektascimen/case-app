<?php

namespace App\Services;

use App\Traits\TaskRepositoryTrait;

class TaskService extends AbstractService
{
    use TaskRepositoryTrait;

    public const WEEKLY_WORKING_CAPACITY = 45;

    /**
     * @var array
     */
    protected $developerWeeklyCapacity = [];

    /**
     * @var array
     */
    protected $tasks = [];

    /**
     * @var array
     */
    protected $assignedTasks = [];

    /**
     * @return array
     */
    public function getTasks(): array
    {
        return $this->getTaskRepository()->getTasks();
    }

    /**
     * @param array $data
     * @return void
     */
    public function saveProviderOneTasks(array $data): void
    {
        $this->getTaskRepository()->saveProviderOneTasks($data);
    }

    /**
     * @param array $data
     * @return void
     */
    public function saveProviderTwoTasks(array $data): void
    {
        $this->getTaskRepository()->saveProviderTwoTasks($data);
    }

    /**
     * @param $tasks
     * @param $developers
     * @return mixed
     */
    public function assignJobsToDeveloper($tasks, $developers)
    {
        $this->tasks = $tasks;
        $totalWorkWeek = $this->calculateTotalWeek($developers);

        for ($i = 0; $i < $totalWorkWeek; $i++) {
            foreach ($developers as &$developer) {
                $this->developerWeeklyCapacity = $developer['difficulty_level'] * self::WEEKLY_WORKING_CAPACITY;
                $developer['assignedTasks'][$i+1 . '-week'] = $this->calculateDeveloperJobs();
                $this->assignedTasks = [];
            }
        }

        return $developers;
    }

    /**
     * @return array
     */
    public function calculateDeveloperJobs(): array
    {
        foreach ($this->tasks as $key => $task) {
            if ($this->developerWeeklyCapacity > 0) {
                if ($this->developerWeeklyCapacity < $task['time']) {
                    break;
                }

                $this->assignedTasks[] = $task;
                unset($this->tasks[$key]);
                $this->developerWeeklyCapacity -= $task['time'];

            }
        }

        unset($this->developerWeeklyCapacity);

        return $this->assignedTasks;
    }

    /**
     * @param $developers
     * @return int
     */
    public function calculateTotalWeek($developers): int
    {
        $totalTaskHours = $this->getTotalTaskHours();
        $totalDeveloperWeeklyWorkingHour = $this->totalDeveloperWeeklyWorkingHour($developers);

        return (int)ceil($totalTaskHours / $totalDeveloperWeeklyWorkingHour);
    }

    /**
     * @return int
     */
    public function getTotalTaskHours(): int
    {
        $totalTaskHours = 0;

        foreach ($this->tasks as $task) {
            $totalTaskHours += $task['time'];
        }

        return $totalTaskHours;
    }

    /**
     * @param $developers
     * @return float
     */
    public function totalDeveloperWeeklyWorkingHour($developers): float
    {
        $totalDeveloperWeeklyWorkingHour = 0;

        foreach ($developers as $developer) {
            $totalDeveloperWeeklyWorkingHour += $developer['difficulty_level'] * self::WEEKLY_WORKING_CAPACITY;
        }

        return $totalDeveloperWeeklyWorkingHour;
    }
}
