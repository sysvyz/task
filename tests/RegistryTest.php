<?php

use PHPUnit\Framework\TestCase;

class RegistryTest extends TestCase
{


    public function testRegistry()
    {
        $registry = new \Svz\Task\WorkerRegistry();
        $registry->register(new \Svz\TaskTest\WorkerMock());
        $task = new \Svz\TaskTest\TaskMock();
        $worker = $registry->getWorker($task);
        $this->assertTrue($worker->handle($task));

    }

}