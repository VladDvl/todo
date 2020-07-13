<?php

abstract class Controller {
    protected $manager;

    public function __construct(TaskManager $manager)
    {
        $this->manager = $manager;
    }
}
