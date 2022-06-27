<?php

namespace App\Http\Controllers;

use App\consulta;
use App\mascota;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class consultasController extends Controller
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
        $consultas = consulta::where('iddueño', '=', Auth::user()->id)->get();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mascotas = mascota::where('iddueño', '=', Auth::user()->id)->get();
        return view('consultas.formulario', compact('mascotas'));
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
        // dd($request);
        $consulta = new consulta();
        $consulta->iddueño = Auth::user()->id;

        $consulta->nombredueño = $request->nombredueño;
        $consulta->nombremascota = $request->nombremascota;
        $consulta->tipo = $request->tipo;
        $consulta->peso = $request->peso;
        $consulta->edad = $request->edad;
        $consulta->sintomas = $request->sintomas;
        $consulta->receta = $request->receta;
        $consulta->fechaconsulta = Carbon::now();
        $consulta->fechaproxima = $request->fecha;
        $consulta->save();

        return redirect()->route('consulta.index');
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
        $consulta = consulta::where('id', '=', $id)->first();
        return view('consultas.formularioEdit', compact('consulta'));
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

            return  redirect()->route('consulta.destroy', $id);
        } else {
            $consulta = consulta::where('id', '=', $id)->first();
            $consulta->iddueño = Auth::user()->id;
            $consulta->nombredueño = $request->nombredueño;
            $consulta->nombremascota = $request->nombremascota;
            $consulta->tipo = $request->tipo;
            $consulta->peso = $request->peso;
            $consulta->edad = $request->edad;
            $consulta->sintomas = $request->sintomas;
            $consulta->receta = $request->receta;
            $consulta->fechaconsulta = Carbon::now();
            $consulta->fechaproxima = $request->fecha;
            $consulta->save();
            return redirect()->route('consulta.index');
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
        $consulta = consulta::where('id', '=', $id)->first();
        $consulta->delete();
       
        return redirect()->route('consulta.index');
    }
}
