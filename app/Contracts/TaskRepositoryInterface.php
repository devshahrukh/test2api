<?php

namespace App\Contracts;

/**
 * Interface for all the task related things
 */
interface TaskRepositoryInterface{
    /**
     * Fetch all the tasks
     */
    public function getAllTasks();

    /**
     * Add new task
     */
    public function addTask(string $task);
}