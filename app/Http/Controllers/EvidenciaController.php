<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['evidencias']=Evidencia::paginate(5);
        return view('evidencia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evidencia.create');
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

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'AnnoGraduado'=>'required|integer|max:100',
            'Direccion'=>'required|string|max:100',
            'AreaTrabajo'=>'required|string|max:100',
            // 'FotocopiaTitulo'=>'required|string|max:100',
            // 'ActaSolicitud'=>'required|string|max:100',
            'EdicionMaestria'=>'required|string|max:100',

        ];
        $mensaje=[

            'required'=>'El :attribute es requerido'
            // 'FotocopiaTitulo.required'=>'La fotocopia del titulo es requerida',
            // 'ActaSolicitud.required'=>'La solicitud es requerida'

        ];

        $this->validate($request, $campos, $mensaje);

        $datosEvidencia = request()->except('_token');

        // if($request->hasFile('FotocopiaTitulo')){
        //     $datosEvidencia['FotocopiaTitulo']=$request->file('FotocopiaTitulo')->store('uploads','public');
        // }

        // if($request->hasFile('ActaSolicitud')){
        //     $datosEvidencia['ActaSolicitud']=$request->file('ActaSolicitud')->store('uploads','public');
        // }


        Evidencia::insert($datosEvidencia);

        // return response()->json($datosEvidencia);
        return redirect('evidencia')->with('mensaje','Evidencia agregada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Evidencia $evidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $evidencia=evidencia::findOrFail($id);
        return view('evidencia.edit', compact('evidencia') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'AnnoGraduado'=>'required|integer|max:100',
            'Direccion'=>'required|string|max:100',
            'AreaTrabajo'=>'required|string|max:100',
            // 'FotocopiaTitulo'=>'required|string|max:100',
            // 'ActaSolicitud'=>'required|string|max:100',
            'EdicionMaestria'=>'required|string|max:100',

        ];
        $mensaje=[

            'required'=>'El :attribute es requerido',
            // 'FotocopiaTitulo.required'=>'La fotocopia del titulo es requerida',
            // 'ActaSolicitud.required'=>'La solicitud es requerida'
        ];


        $datosEvidencia = request()->except(['_token','_method']);
        Evidencia::where('id','=',$id)->update($datosEvidencia);

        $evidencia=Evidencia::findOrFail($id);
        // return view('evidencia.edit', compact('evidencia'));

        return redirect('evidencia')->with('mensaje','Evidencia Modificada');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    
    {
        //
        $evidencia=Evidencia::findOrFail($id);

        if(Storage::delete('public/'.$evidencia->ActaSolicitud)){
            if(Storage::delete('public/'.$evidencia->FotocopiaTitulo)){
                
        Evidencia::destroy($id);
            }
       } 
       
       return redirect('evidencia')->whit('mensaje','evidencia eliminada');

    }
}
