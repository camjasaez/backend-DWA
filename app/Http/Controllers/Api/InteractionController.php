<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InteractionRequest;
use App\Models\Interaccion;
use App\Repositories\InteractionRepository;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    protected InteractionRepository $interaction;

    public function __construct(InteractionRepository $interaction)
    {
        $this->interaction = $interaction;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->interaction->listarInteracciones();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(InteractionRequest $request)
    {
        return $this->interaction->crearInteraccion($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->interaction->filtrarInteracciones($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(InteractionRequest $request, $id)
    {
        return $this->interaction->actualizarInteraccion($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->interaction->eliminarInteraccion($id);
    }
}
