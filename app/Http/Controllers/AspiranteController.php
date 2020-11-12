<?php

namespace App\Http\Controllers;

use App\Prestacion;
use App\Solicitud;
use App\User;
use App\Vacante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AspiranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      return User::whereRoleIs('aspirante')->with('perfil_aspirante.especialidad')->orderBy('id', 'desc')->paginate(15);
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

      $compra = DB::table('compras')
        ->select('compras.*')
        ->leftJoin('plans', 'plans.id', '=', 'compras.plan_id')
        ->where([
          ['compras.user_id', Auth::id()],
          ['compras.finish_at', '>', Carbon::now()->toDateTimeString()]
        ])
        ->whereRaw('(select count(*) from `vacantes` where `compras`.`id` = `vacantes`.`compra_id`) < plans.publicaciones_normales')
        ->first();

      $post = Vacante::whereRaw('user_id = ? AND ? > created_at', [Auth::id(), Carbon::now()->addDays(30)->toDateTimeString()])->first();

      if (!$compra && $post) {
        return response()->json(['error' => 'No puedes publicar nuevas ofertas. Adquiere un nuevo plan'], 422);
      }
      $finish_at = Carbon::now()->addDays(60)->format('Y-m-d H:i:s');
      $data = $request->all();
      $data['user_id'] = Auth::id();
      $data['finish_at'] = $finish_at;
      $data['compra_id'] = $compra->id;

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
      $aspirante = User::whereRoleIs('aspirante')->with(
        ['perfil_aspirante.especialidad',
        'perfil_aspirante.estado',
        'perfil_aspirante.municipio',
        'experiencias',
        'formaciones'
        ])->where('id', $id)->first();
      return $aspirante;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aplicar($id)
    {
      $solicitud = Solicitud::where([
        ['user_id', Auth::id()],
        ['vacante_id', $id]
      ])->first();

      if ($solicitud) {
        return $solicitud;
      }

      return Solicitud::create(['user_id' => Auth::id(), 'vacante_id' => $id]);
    }
}
