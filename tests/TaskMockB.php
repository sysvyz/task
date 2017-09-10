<?php namespace Svz\TaskTest;

use Svz\Task\Contract\Task;
use Svz\Task\Priority;

class TaskMockB implements Task
{

    /**
     * @return int
     */
    public function getPriority()
    {
        return Priority::MID;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return self::class;
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return ['foo' => 'bar'];
    }
}