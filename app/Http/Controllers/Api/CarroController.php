<?php

namespace App\Http\Controllers\Api;

use App\Carro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\API\ApiError;

class CarroController extends Controller
{
    /**
     * @var Carro
     */
    private $carros;

    public function __construct(Carro $carros)
    {
        $this->carros = $carros;
    }

    public function index()
    {
        $data = ['carros' => $this->carros->all()];

        return response()->json($data);
    }

    public function pagination()
    {
        $data = ['carros' => $this->carros->paginate(10)];

        return response()->json($data);
    }

    public function show($id)
    {
        $data = $this->carros->find($id);

        if (!$data) {
            return response()->json(['msg' => 'Carro não encontrado'], 404);
        }

        $data = ['data' => $data];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $newCarro = $request->all();
            $this->carros->create($newCarro);

            return response()->json(['msg' => 'Carro cadastrado com suscesso'], 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::erroMessage($e->getMessage(), 1010));
            }

            return response()->json(ApiError)::erroMessage('Houve um erro ao cadastrar', 1010);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $newCarro = $request->all();
            $car = $this->carros->find($id);
            $car->update($newCarro);

            return response()->json(['msg' => 'Carro atualizado com sucesso com suscesso'], 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::erroMessage($e->getMessage(), 1010));
            }

            return response()->json(ApiError)::erroMessage('Houve um erro ao atualizar', 1010);
        }
    }

    public function delete(Carro $id)
    {
        try {
            $id->delete();

            return response()->json(['msg' => 'Carro deletado com sucesso'], 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::erroMessage($e->getMessage(), 1010));
            }

            return response()->json(ApiError)::erroMessage('Houve um erro ao deletar', 1010);
        }
    }
}
