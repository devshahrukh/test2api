<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Contracts\TaskRepositoryInterface;

class TaskController extends Controller{
    /**
     * @var TaskRepositoryInterface
     */
	protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
    	$this->taskRepository = $taskRepository;
    }

    /**
     * Fetch all the tasks
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
    	try{
    		$tasks = $this->taskRepository->getAllTasks();

    		return response()->json([
    			'error' 	=> false,
    			'data' 		=>  $tasks
    		]);
    	}
    	catch(Exception $e){
    		return response()->json([
    			'error' => true,
    			'message' => $e->getMessage()
    		], 500);
    	}
    }

    /**
     * Add new task
     * @param Request $req
     * @return JsonResponse
     */
    public function store(Request $req): JsonResponse
    {
    	try{
    		$this->taskRepository->addTask($req->task);

    		return response()->json([
    			'error' => false,
    			'message' => 'Task added succesfully'
    		], 201);
    	}
    	catch(Exception $e){
    		return response()->json([
    			'error' => true,
    			'message' => $e->getMessage()
    		], 500);
    	}
    }
}
