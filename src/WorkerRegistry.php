<?php

namespace Svz\Task;

use Svz\Task\Contract\Task;
use Svz\Task\Contract\Worker;
use Svz\Task\Contract\WorkerRegistry as WorkerRegistryContract;

class WorkerRegistry implements WorkerRegistryContract
{

    private $workers;

    public function register(Worker $worker)
    {
        $this->workers[$worker->getName()] = $worker;
    }

    /**
     * @param Task $task
     * @return Worker
     */
    public function getWorker(Task $task)
    {
        return $this->workers[$task->getName()];
    }
}