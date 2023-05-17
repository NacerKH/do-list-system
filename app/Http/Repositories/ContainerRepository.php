<?php

namespace App\Http\Repositories;
 
use App\Http\Contracts\ContainerRepositoryInterface ;
use App\Http\Resources\ContainerResources;
use App\Models\Container;
use App\Traits\BaseApiRepositoryTrait;
class ContainerRepository implements ContainerRepositoryInterface  
{
    use BaseApiRepositoryTrait;


   public  function model()
    {
        return Container::class;
    } 


    function validationRules($resource_id = 0)
    {
     
        return [
            'name' => 'required',
            'is_editing_container' => 'boolean',
            'is_adding_card' => 'boolean',
        ];
    }

    public function index()
    {
        
        return $this->success($this->classNameForResponse(1) . '_list', ContainerResources::make($this->model()::get()));
    }


}
