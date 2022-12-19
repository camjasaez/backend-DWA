<?php

namespace App\Repositories;

use App\Models\Dog;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class DogRepository
{
    public function listarPerros()
    {
        try {
            $perros = Dog::all();
            return response()->json($perros, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al listar los perros'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function filtrarPerros($id)
    {
        try {
            $perro = Dog::find($id);
            if (!$perro) {
                return response()->json(
                    ['error' => 'No existe el perro'],
                    Response::HTTP_NOT_FOUND
                );
            }
            return response()->json($perro, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al listar el perro'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function crearPerro($request)
    {
        try {
            $perro = Dog::create($request->all());
            $perro->save();
            return response()->json($perro, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear el perro'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function actualizarPerro($request, $id)
    {
        try {
            $perro = Dog::find($id);
            if (!$perro) {
                return response()->json(
                    ['error' => 'No existe el perro'],
                    Response::HTTP_NOT_FOUND
                );
            }
            $perro->update($request->all());
            return response()->json($perro, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar el perro'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function eliminarPerro($id)
    {
        try {
            $perro = Dog::find($id);
            if (!$perro) {
                return response()->json(
                    ['error' => 'No existe el perro'],
                    Response::HTTP_NOT_FOUND
                );
            }

            $perro->delete();
            return response()->json($perro, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar el perro'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
