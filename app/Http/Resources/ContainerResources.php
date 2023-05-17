<?php

namespace App\Http\Resources;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContainerResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {    $tasks= TaskResources::make(Task::get());
        return [
            'title' => 'Board Title',
            'last_modified' =>  $tasks->last()->first()->updated_at,
            'containers' =>  parent::toArray($request),
            'cards' => $tasks,
        ];
    }
}
