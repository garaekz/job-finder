<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
  /**
   * Update the user's profile information.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $user = Auth::user();
    $id = Auth::id();
    $this->validate($request, [
      'password' => 'min:6|confirmed',
      'email' => 'unique:users,email,'.$id
    ]);
    $data = $request->all();
    $role = $user->role;

    try {
      $user->update($data);
      if ($role === 'empresa') {
        $user->perfil_empresa->update($data);
      } else {
        $user->perfil_aspirante->update($data);
      }

      return response()->json(['user' => $user]);
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  /**
   * Update the user's profile information.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function updateImage(Request $request)
  {
    $this->validate($request, [
      'file' => 'required|mimes:png,jpg',
    ]);
    $role = Auth::user()->role;
    try {
      $path = $request->file->store('avatars', 'public');
      $fullpath = '/storage/'.$path;
      if ($role === 'empresa') {
        $perfil = Auth::user()->perfil_empresa;
        $perfil->logo = $fullpath;
      } else {
        $perfil = Auth::user()->perfil_aspirante;
        $perfil->foto = $fullpath;
      }
      $perfil->save();
      return response()->json(['path' => $fullpath]);
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}
