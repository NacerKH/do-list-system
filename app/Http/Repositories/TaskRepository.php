<?php

namespace App\Http\Repositories;

use App\Http\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use App\Traits\BaseApiRepositoryTrait;

class TaskRepository implements TaskRepositoryInterface
{
    use BaseApiRepositoryTrait;


   public  function model()
    {
        return Task::class;
    } 


    function validationRules($resource_id = 0)
    {
        // $unique_identifier_rules = 'required|string|max:255';
        // if ($resource_id) {
        //     // we put here validation rules for update
        //     $unique_identifier_rules = [
        //         'required',
        //         'string',
        //         'max:255',
        //     ];
        // }

        return [
            'title' => 'required',
            'description' => 'required',
            'priority' => ['required', 'numeric', 'between:1,5'],
            'date_of_completion' =>  'date', 'after:now',
        ];
    }

}
