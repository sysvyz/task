<?php

namespace Svz\Task\Contract;


interface WorkerRegistry
{

public function  register(Worker $worker);

    /**
     * @param Task $worker
     * @return Worker
     */
public function  getWorker(Task $worker);
}