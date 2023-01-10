<?php

namespace App\Repositories;

use App\Models\Interaccion;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class InteractionRepository
{
    public function listarInteracciones()
    {
        try {
            $interaccion = Interaccion::with(['perroInteresado', 'perroCandidato'])->get();
            return response()->json($interaccion, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(
                ['error' => 'Error al listar las interacciones'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function listarAceptados()
    {
        try {
            $interaccion = Interaccion::with(['perroInteresado', 'perroCandidato'])->where('preferencia', 'A')
                ->get();

            return response()->json($interaccion, Response::HTTP_OK);

        } catch (Exception $e) {
            return response()->json(
                ['error' => 'Error al listar las interacciones'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function listaRechazado()
    {
        try {
            $interaccion = Interaccion::with(['perroInteresado', 'perroCandidato'])
                ->where('preferencia', 'R')
                ->get();
            return response()->json($interaccion, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(
                ['error' => 'Error al listar las interacciones'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function filtrarInteracciones($id)
    {
        try {
            $interaccion = Interaccion::find($id);
            if (!$interaccion) {
                return response()->json(
                    ['error' => 'No existe la interaccion'],
                    Response::HTTP_NOT_FOUND
                );
            }
            return response()->json($interaccion, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(
                ['error' => 'Error al listar la interaccion'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function crearInteraccion($request)
    {
        try {
            $interaccion = Interaccion::create($request->all());
            $interaccion->save();
            return response()->json($interaccion, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(
                ['error' => 'Error al crear la interaccion'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function actualizarInteraccion($request, $id)
    {
        try {
            $interaccion = Interaccion::find($id);
            if (!$interaccion) {
                return response()->json(
                    ['error' => 'No existe la interaccion'],
                    Response::HTTP_NOT_FOUND
                );
            }
            $interaccion->update($request->all());
            return response()->json($interaccion, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(
                ['error' => 'Error al actualizar la interaccion'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function eliminarInteraccion($id)
    {
        try {
            $interaccion = Interaccion::find($id);
            if (!$interaccion) {
                return response()->json(
                    ['error' => 'No existe la interaccion'],
                    Response::HTTP_NOT_FOUND
                );
            }
            $interaccion->delete();
            return response()->json(
                ['message' => 'Interaccion eliminada correctamente'],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return response()->json(
                ['error' => 'Error al eliminar la interaccion'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

}
