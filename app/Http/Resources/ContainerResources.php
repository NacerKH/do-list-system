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
    {
        return [
            'title' => 'Board Title',
            'last_modified' => $this->last()->first()->update_at,
            'containers' =>  parent::toArray($request),
            'cards' =>TaskResources::make(Task::get()),
        ];
    }
}
