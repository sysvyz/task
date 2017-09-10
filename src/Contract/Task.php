<?php

namespace Svz\Task\Contract;


interface Task
{
    /**
     * @return int
     */
    public function getPriority();
    /**
     * @return string
     */
    public function getName();

    /**
     * @return array
     */
    public function getArgs();
}