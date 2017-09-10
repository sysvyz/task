<?php namespace Svz\TaskTest;

use Svz\Task\Contract\Worker;

class WorkerMock implements Worker
{
    private $executed = false;

    public function hasExecuted()
    {
        return $this->executed;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return TaskMock::class;
    }


    /**
     * @param TaskMock $task
     * @return bool
     */
    public function handle($task)
    {
        var_dump(WorkerMock::class);
        $this->executed = true;
        return true;
    }
}