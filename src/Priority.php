<?php

namespace Svz\Task;


class Priority
{

    /**
     * do it or not
     */
    const LOWER = 100;
    /**
     * there are possibly some more important jobs
     *
     */
    const LOW = 200;
    /**
     * thats a task
     */
    const MID = 300;
    /**
     * do it as soon as possible
     */
    const HIGH = 400;
    /**
     * do it right now
     */
    const HIGHER = 500;
}