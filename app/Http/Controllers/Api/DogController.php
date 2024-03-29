<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DogRequest;
use App\Models\Dog;
use App\Repositories\DogRepository;
use Illuminate\Http\Request;

class DogController extends Controller
{
    protected DogRepository $dog;

    public function __construct(DogRepository $dog)
    {
        $this->dog = $dog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->dog->listarPerros();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DogRequest $request)
    {
        return $this->dog->crearPerro($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->dog->filtrarPerros($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(DogRequest $request, $id)
    {
        return $this->dog->actualizarPerro($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->dog->eliminarPerro($id);
    }
}
