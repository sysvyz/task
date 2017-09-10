<?php

namespace Svz\Task\Contract;


interface TaskProvider
{
    /**
     * @return Task[]
     */
    public function getTasks(): array;
}