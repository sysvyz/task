<?php namespace Svz\TaskTest;

use Svz\Task\Contract\Worker;

class WorkerMockB implements Worker
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
        return TaskMockB::class;
    }


    /**
     * @param TaskMock $task
     * @return bool
     */
    public function handle($task)
    {
        var_dump(WorkerMockB::class);
        $this->executed = true;
        return true;
    }
}