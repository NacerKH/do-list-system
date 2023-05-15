<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TaskRepository;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct(private TaskRepository $taskRepository, private Task $model)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->taskRepository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this-> taskRepository->create($request->only($this->model->getFillable()));
    }

    /**
     * Display the specified resource.
     */
    public function show( $resource_id)
    {
        return $this->taskRepository->show($resource_id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $resource_id)
    {
        return $this->taskRepository->update($resource_id, $request->only($this->model->getFillable()));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($resource_id)
    {
        return $this->taskRepository->delete($resource_id);


    }
}
