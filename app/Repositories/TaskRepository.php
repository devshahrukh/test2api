<?php

namespace App\Repositories;

use App\Task;
use Illuminate\Http\JsonResponse;
use App\Contracts\TaskRepositoryInterface;

/**
 * Class TaskRepository
 *
 * @package App\Repositories
 */
class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Task Model
     */
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Add the new task
     * @param string $task
     * @return mixed
     */
    public function getAllTasks()
    {
        try {
            return $this->task->get();
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Add the new task
     * @param string $task
     * @return mixed
     */
    public function addTask(string $task)
    {
        try {
            $task = $this->task->create([
                'title' => $task
            ]);

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
}