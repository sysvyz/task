<?php

namespace Svz\Task\Contract;


interface Worker
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @param Task $task
     * @return bool
     */
    public function handle( $task);


}