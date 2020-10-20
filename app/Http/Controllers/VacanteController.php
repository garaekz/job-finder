<?php

namespace App\Http\Controllers;

use App\Prestacion;
use App\Vacante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request->nuevas) {
        return Vacante::with(['estado','user'])->orderBy('id', 'desc')->limit(6)->get();
      }
      return Vacante::with(['estado','user'])->orderBy('id', 'desc')->paginate(15);
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
        'estado_id' => 'required',
        'puesto' => 'required',
        'jornada' => 'required',
        'descripcion' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'experiencia' => 'required',
        'sueldo' => 'required',
        'actividades' => 'required',
        'telefono' => 'required',
        'email' => 'required',
        'prestaciones' => 'required'
      ]);
      $finish_at = Carbon::now()->addDays(60)->format('Y-m-d H:i:s');
      $data = $request->all();
      $data['user_id'] = Auth::id();
      $data['finish_at'] = $finish_at;

      try {
        DB::beginTransaction();
        $vacante = Vacante::create($data);
        $vacante->prestaciones()->sync($request->prestaciones);
        DB::commit();
        $vacante->prestaciones = $request->prestaciones;
        return response()->json($vacante);
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
      $vacante = Vacante::with(['estado','user'])->where('id', $id)->first();
      $prestaciones = Prestacion::whereHas('vacantes', function ($q) use ($id)
      {
        $q->where('vacante_id', $id);
      })->get()->pluck("id");
      $vacante->prestaciones = $prestaciones;
      return $vacante;
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
        'estado_id' => 'required',
        'puesto' => 'required',
        'jornada' => 'required',
        'descripcion' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'experiencia' => 'required',
        'sueldo' => 'required',
        'actividades' => 'required',
        'telefono' => 'required',
        'email' => 'required',
        'prestaciones' => 'required'
      ]);
      $data = $request->all();

      try {
        DB::beginTransaction();
        $vacante = Vacante::find($id);
        $vacante->update($data);
        $vacante->prestaciones()->sync($request->prestaciones);
        DB::commit();
        $vacante->prestaciones = $request->prestaciones;
        return response()->json($vacante);
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        return response()->json(['error' => 'Error al guardar los datos'], 500);
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
      try {
        Vacante::destroy($id);
        return response()->json(['id' => $id]);
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        return response()->json(['error' => 'Error al eliminar el registro'], 500);
      }

    }
}
