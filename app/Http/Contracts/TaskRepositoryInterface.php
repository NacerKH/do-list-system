<?php

namespace App\Http\Contracts;

use App\Http\BaseApiRepositoryInterface;

interface TaskRepositoryInterface extends BaseApiRepositoryInterface
{
    public function switchContainer($resource_id, $container_id);
}
