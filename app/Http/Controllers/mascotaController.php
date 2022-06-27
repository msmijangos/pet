<?php

namespace App\Http\Controllers;

use App\mascota;
use App\consulta;
use App\vacuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mascotaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $mascotas = mascota::where('iddueño', '=', Auth::user()->id)->get();

        return view("mascota.index", compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mascota.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $mascota = new mascota;
        $request->merge(['iddueño' => Auth::user()->id]);
        $mascota = mascota::create($request->all());

        return redirect()->route('mascota.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $mascota = mascota::where('id', '=', $id)->first();

        return view("mascota.formularioEdit", compact('mascota'));
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
        //

        if ($request->eliminar == "eliminar") {

            return  redirect()->route('mascota.destroy', $id);
        } else {
            $mascota = mascota::where('id', '=', $id)->first();
            $mascota->nombre = $request->nombre;
            $mascota->tipo = $request->tipo;
            $mascota->edad = $request->edad;
            $mascota->save();

            return redirect()->route('mascota.index');
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
        //

        $mascota = mascota::where('id', '=', $id)->first();
        $mascota->delete();
        // $vacunas = vacuna::where('nombre','=',$mascota->nombre)->get();
        // $vacunas->delete();
        vacuna::where('nombremascota', $mascota->nombre)->delete();
        consulta::where('nombremascota', $mascota->nombre)->delete();

        return redirect()->route('mascota.index');
    }
}
