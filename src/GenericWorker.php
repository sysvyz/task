<?php

namespace Svz\Task;


use Svz\Task\Contract\Task;
use Svz\Task\Contract\Worker;

class GenericWorker implements Worker
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var callable
     */
    private $handler;

    /**
     * @param string $name
     * @param callable $handler
     * @return GenericWorker
     */
    public static function init($name, callable $handler)
    {
        return new self($name, $handler);
    }

    /**
     * GenericWorker constructor.
     * @param string $name
     * @param callable $handler
     */
    public function __construct($name, callable $handler)
    {
        $this->name = $name;
        $this->handler = $handler;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Task $task
     * @return bool
     */
    public function handle($task)
    {
        return ($this->handler)($task);
    }
}