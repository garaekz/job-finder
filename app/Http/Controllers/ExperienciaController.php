<?php

namespace App\Http\Controllers;

use App\ExperienciaLaboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
      return ExperienciaLaboral::where('user_id', $id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'empresa' => 'required',
        'inicio' => 'required',
        'termino' => 'required',
        'sueldo' => 'required',
        'puesto' => 'required',
        'desc_actividades' => 'required',
        'motivo_separacion' => 'required',
      ]);

      $data = $request->all();
      $data['user_id'] = Auth::id();

      try {
        DB::beginTransaction();
        $formacion = ExperienciaLaboral::create($data);
        DB::commit();
        return response()->json($formacion);
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        return response()->json(['error' => 'Error al guardar los datos'], 422);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'empresa' => 'required',
        'inicio' => 'required',
        'termino' => 'required',
        'sueldo' => 'required',
        'puesto' => 'required',
        'desc_actividades' => 'required',
        'motivo_separacion' => 'required',
      ]);

      $experiencia = ExperienciaLaboral::findOrFail($id);

      $data = $request->all();
      $data['user_id'] = Auth::id();

      try {
        DB::beginTransaction();
        $experiencia->update($data);
        DB::commit();
        return response()->json($experiencia);
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        return response()->json(['error' => 'Error al guardar los datos'], 422);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $experiencia = ExperienciaLaboral::findOrFail($id);

      try {
        DB::beginTransaction();
        $experiencia->delete();
        DB::commit();
        return response()->json(["id" => $id]);
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        return response()->json(['error' => 'Error al borrar el registro'], 422);
      }
    }
}
