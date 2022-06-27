<?php

namespace App\Http\Controllers;

use App\mascota;
use App\vacuna;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class vacunasController extends Controller
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
        
        $vacunas = vacuna::where('iddueño', '=', Auth::user()->id)->get();

        return view('vacunas.index', compact('vacunas'));
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

        return view('vacunas.formulario', compact('mascotas'));
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
        $vacuna = new vacuna();
        $vacuna->iddueño = Auth::user()->id;
        $vacuna->fecharegistro = Carbon::now();
        $vacuna->estatus = 'Por aplicar';
        $vacuna->nombre = $request->nombre;
        $vacuna->nombreaplicador = "";
        $vacuna->nombremascota = $request->nombremascota;
        $vacuna->fecha = $request->fecha;

        $vacuna->save();

        return redirect()->route('vacuna.index');
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
        $vacuna = vacuna::where('id', '=', $id)->first();

        return view("vacunas.formularioEdit", compact('vacuna'));
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

            return  redirect()->route('vacuna.destroy', $id);
        } else {
            $vacuna = vacuna::where('id', '=', $id)->first();
            $vacuna->nombre = $request->nombre;
            $vacuna->nombreaplicador = $request->nombreaplicador;
            $vacuna->nombremascota = $request->nombremascota;
            $vacuna->fecha = $request->fecha;
            $vacuna->fecharegistro = $request->fecharegistro;


            $vacuna->save();


            return redirect()->route('vacuna.index');
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
        $vacuna = vacuna::where('id', '=', $id)->first();
        if ($vacuna->nombreaplicador == '') {
            return redirect()->route('vacuna.index');
        } else {
            $vacuna->estatus = 'Aplicada';
            $vacuna->save();
            return redirect()->route('vacuna.index');
        }
    }
}
