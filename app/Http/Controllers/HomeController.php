<?php

namespace App\Http\Controllers;

use App\Traits\DeveloperServiceTrait;
use App\Traits\TaskServiceTrait;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use DeveloperServiceTrait, TaskServiceTrait;

    public function index()
    {
        $developers = $this->getDeveloperService()->getDevelopers();
        $tasks = $this->getTaskService()->getTasks();
        $developersWithAssignTasks = $this->getTaskService()->assignJobsToDeveloper($tasks, $developers);

        return view('welcome', compact('developers', 'tasks', 'developersWithAssignTasks'));
    }
}
