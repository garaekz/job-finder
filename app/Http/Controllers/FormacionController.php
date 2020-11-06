<?php

namespace App\Http\Controllers;

use App\Formacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
      return Formacion::where('user_id', $id)->get();
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
        'lugar' => 'required',
        'inicio' => 'required',
        'termino' => 'required',
      ]);

      $data = $request->all();
      $data['user_id'] = Auth::id();

      try {
        DB::beginTransaction();
        $formacion = Formacion::create($data);
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
        'lugar' => 'required',
        'inicio' => 'required',
        'termino' => 'required',
      ]);

      $formacion = Formacion::findOrFail($id);

      $data = $request->all();
      $data['user_id'] = Auth::id();

      try {
        DB::beginTransaction();
        $formacion->update($data);
        DB::commit();
        return response()->json($formacion);
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        return response()->json(['error' => 'Error al actualizar los datos'], 422);
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
      $formacion = Formacion::findOrFail($id);

      try {
        DB::beginTransaction();
        $formacion->delete();
        DB::commit();
        return response()->json(["id" => $id]);
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        return response()->json(['error' => 'Error al borrar el registro'], 422);
      }
    }
}
