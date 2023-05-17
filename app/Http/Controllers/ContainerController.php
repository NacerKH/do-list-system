<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ContainerRepository;
use App\Models\Container;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    public function __construct(private ContainerRepository $containerRepository, private Container $model)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->containerRepository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->containerRepository->create($request->only($this->model->getFillable()));
    }

    /**
     * Display the specified resource.
     */
    public function show($resource_id)
    {
        return $this->containerRepository->show($resource_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $resource_id)
    {
        return $this->containerRepository->update($resource_id, $request->only($this->model->getFillable()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($resource_id)
    {
        return $this->containerRepository->delete($resource_id);
    }

}
