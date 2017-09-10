<?php

use PHPUnit\Framework\TestCase;

class JobServiceTest extends TestCase
{


    public function testJobService()
    {
        $registry = new \Svz\Task\WorkerRegistry();
        $w = new \Svz\TaskTest\WorkerMock();
        $v = new \Svz\TaskTest\WorkerMockB();
        $registry->register($w);
        $registry->register($v);

        $t = new \Svz\TaskTest\TaskMock();
        $u = new \Svz\TaskTest\TaskMockB();

        $tp = new \Svz\TaskTest\TaskProviderMock();
        $tp->add($t);
        $tp->add($u);

        $svc = new \Svz\Task\TaskService($tp, $registry);
        $svc->run();
        $this->assertTrue($w->hasExecuted());
        $this->assertTrue($v->hasExecuted());
    }


    public function testGenericWorker()
    {
        $registry = new \Svz\Task\WorkerRegistry();
        $w = new \Svz\TaskTest\WorkerMock();
        $check = false;
        $v = \Svz\Task\GenericWorker::init(
            \Svz\TaskTest\TaskMockB::class,
            function () use (&$check) {
                return $check = true;
            });
        $registry->register($w);
        $registry->register($v);

        $t = new \Svz\TaskTest\TaskMock();
        $u = new \Svz\TaskTest\TaskMockB();

        $tp = new \Svz\TaskTest\TaskProviderMock();
        $tp->add($t);
        $tp->add($u);

        $svc = new \Svz\Task\TaskService($tp, $registry);
        $svc->run();
        $this->assertTrue($w->hasExecuted());
        $this->assertTrue($check);
    }

}