<?php

namespace App\Http\Controllers;

use App\mascota;
use Illuminate\Http\Request;

class mascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mascotas = mascota::all();
        // dd($mascotas);

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

            return  redirect()->route('mascota.destroy',$id);
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

        $mascota=mascota::where('id','=',$id)->first();
        $mascota->delete();

        return redirect()->route('mascota.index');

    }
}
