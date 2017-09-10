<?php

namespace Svz\TaskTest;


use Svz\Task\Contract\Task;
use Svz\Task\Contract\TaskProvider;

class TaskProviderMock implements TaskProvider
{

    private $tasks = [];

    public function add(Task $task)
    {
        $this->tasks[] = $task;
    }

    /**
     * @return Task[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }
}