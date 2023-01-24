<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\PatinTpa;
use Illuminate\Http\Request;

class PatinTpaController extends Controller
{
    
    public function index()
    {
        $ducto = PatinTpa::all();

        return response()->json([
            'data' => $ducto,
        ], 200);
    }

    
    public function store(Request $request)
    {
        try {
            $ducto = new PatinTpa($request->all());
            $ducto->save();

            return response()->json([
                'data' => $ducto
            ],201);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 501);
        }
    }

    
    public function show($idPatinTpa)
    {
        try {
            $ducto = PatinTpa::where('id', $idPatinTpa)->first();
            
            if ($ducto == NULL)
            {
                return response()->json([
                    'data' => "No se encontró el patín selecionado."
                ],202);
            }

            $ducto->load('salida');
            
            return response()->json([
                'data' => $ducto
            ],202);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 501);
        }
        
    }

    public function update(Request $request, $id_patinTpa)
    {
        try {
            $ducto = PatinTpa::where('id', $id_patinTpa)->first();
            $ducto->nombre = $request->nombre;
            $ducto->presion = $request->presion;
            $ducto->flujo = $request->flujo;
            $ducto->temperatura = $request->temperatura;
            $ducto->densidad = $request->densidad;
            $ducto->densidadCorr = $request->densidadCorr;
            $ducto->grossiv = $request->grossiv;
            $ducto->netgsv = $request->netgsv;
            $ducto->fqi = $request->fqi;
            $ducto->save();

            return response()->json([
                'data' => $ducto
            ],201);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 501);
        }
    }

    public function destroy($idPatinTpa)
    {
        try {
            $ducto = PatinTpa::where('id', $idPatinTpa)->first();
            $ducto->delete();
            
            return response()->json([
                'data' => $ducto
            ],202);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 501);
        }
    }

    public function fetchLlenaderasWeb() {
        $patinWeb = DB::connection('mysqlTpa')->table('patines_web')->get();

        return response()->json([
            'data' => $patinWeb
        ], 200);
    }
}
