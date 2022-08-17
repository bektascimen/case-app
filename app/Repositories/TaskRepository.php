<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\RepositoryInterfaces\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function getTasks(): array
    {
        return Task::query()
            ->orderByRaw("time * level ASC")
            ->get()
            ->toArray();
    }

    public function saveProviderOneTasks(array $data): void
    {
        foreach ($data as $datum)
        {
            Task::updateOrCreate([
                'task_id' => $datum['id'],
                'level' => $datum['zorluk'],
                'time' => $datum['sure']
            ]);
        }
    }

    public function saveProviderTwoTasks(array $data): void
    {
        foreach ($data as $datum) {
            foreach ($datum as $key => $value) {
                Task::updateOrCreate([
                    'task_id' => $key,
                    'level' => $value['level'],
                    'time' => $value['estimated_duration']
                ]);
            }
        }
    }
}
