<?php

namespace App\Http\Repositories;

use App\Http\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use App\Traits\BaseApiRepositoryTrait;
use Illuminate\Http\Request;

class TaskRepository implements TaskRepositoryInterface
{
    use BaseApiRepositoryTrait;


   public  function model()
    {
        return Task::class;
    } 


    function validationRules($resource_id = 0)
    {
       

        return [
            'title' => 'required',
            'content' => 'required',
            'priority' => ['required', 'numeric', 'between:1,5'],
            'date_of_completion' =>  'date', 'after:now',
        ];
    }

 
    public function switchContainer($resource_id, $container_id)
    {
        $resource = $this->model()::findOrFail($resource_id);
   
        $resource->update(['container_id'=> $container_id]);
        return $this->success($this->classNameForResponse() . '_updated', $resource);
    } 

}
