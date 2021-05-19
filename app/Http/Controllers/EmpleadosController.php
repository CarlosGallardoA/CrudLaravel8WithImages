<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['empleados'] = Empleados::paginate(5);
        //return view('empleados.index',$datos);
        $empleados = Empleados::paginate(5);    //Otra forma de hacerlo
        return view('empleados.index',compact('empleados')); //Otra forma de hacerlo
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datos = request()->all(); --> para llamar a todos los datos
        $datos = request()->except('_token'); // llamar todos menos el token
        if($request->hasFile('Foto')){
            $datos['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Empleados::insert($datos); //Insertamos los datos en la base de datos
        return redirect('empleados')->with('Message','Empleado agregado');  //en caso de variable usar with  para mensajes
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except('_token','_method'); // llamar todos menos el token
        if($request->hasFile('Foto')){
            $empleado = Empleados::findOrFail($id); //para consultar la info antigua
            Storage::delete('public/'.$empleado->Foto); //borrar la foto
            $datos['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Empleados::where('id','=',$id)->update($datos);  //actualizar
        $empleado = Empleados::findOrFail($id); //para consultar la info nueva
        return redirect('empleados')->with('Message','Empleado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleados::findOrFail($id); //para consultar la info antigua
        if(Storage::delete('public/'.$empleado->Foto)){
            Empleados::destroy($id);
        }
        return redirect('empleados')->with('Message','Empleado eliminado');

        //$empleado = Empleado::find($id);   --> Otro metodo para borrar sin el destroy
        //$empleado->delete();  -->Otro metodo para borrar sin del destroy

    }
}
