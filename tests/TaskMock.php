<?php
namespace Svz\TaskTest;

use Svz\Task\Contract\Task;
use Svz\Task\Priority;

class TaskMock implements Task
{

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

    /**
     * @return int
     */
    public function getPriority()
    {
        return Priority::HIGH;
    }
}