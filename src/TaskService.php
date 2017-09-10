<?php

namespace Svz\Task;

use Svz\Task\Contract\TaskService as JobServiceContract;
use Svz\Task\Contract\Task;
use Svz\Task\Contract\TaskProvider;
use Svz\Task\Contract\WorkerRegistry;

class TaskService implements JobServiceContract
{
    /**
     * @var TaskProvider
     */
    private $taskProvider;

    /**
     * @var WorkerRegistry
     */
    private $workerRegistry;

    /**
     * JobService constructor.
     * @param TaskProvider $taskProvider
     * @param WorkerRegistry $workerRegistry
     */
    public function __construct(TaskProvider $taskProvider, WorkerRegistry $workerRegistry)
    {
        $this->taskProvider = $taskProvider;
        $this->workerRegistry = $workerRegistry;
    }


    public function run()
    {

        $this->_run($this->_sort());
    }

    public function _sort()
    {

        $heap = new class() extends \SplHeap
        {

            /**
             * Compare elements in order to place them correctly in the heap while sifting up.
             * @link http://php.net/manual/en/splheap.compare.php
             * @param Task $value1 <p>
             * The value of the first node being compared.
             * </p>
             * @param Task $value2 <p>
             * The value of the second node being compared.
             * </p>
             * @return int Result of the comparison, positive integer if <i>value1</i> is greater than <i>value2</i>, 0 if they are equal, negative integer otherwise.
             * </p>
             * <p>
             * Having multiple elements with the same value in a Heap is not recommended. They will end up in an arbitrary relative position.
             * @since 5.3.0
             */
            protected function compare($value1, $value2)
            {
                return $value1->getPriority() - $value2->getPriority();
            }
        };

        foreach ($this->taskProvider->getTasks() as $task) {
            $heap->insert($task);
        }
        return $heap;
    }

    public function _run(\SplHeap $heap)
    {

        while ($heap->valid()) {
            $task = $heap->current();
            $worker = $this->workerRegistry->getWorker($task);
            if (!$worker) {
                throw new \UnexpectedValueException($task->getName());
            }
            $worker->handle($task);
            $heap->next();
        }
    }
}