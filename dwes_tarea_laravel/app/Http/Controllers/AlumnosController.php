<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Alumno;
use App\Curso;
use DB;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $alumnos = Alumno::all();
        // $alumnos= DB::select('select * from alumnos');
         return view("alumnos.lista", compact("alumnos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        return view("alumnos.create", compact("cursos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones =['nombre' => ['required','max:100']];
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.', 'nombre.unique' => 'Ese :attribute ya está dado de alta.', 'nombre.max' => 'El campo :attribute no puede tener más de :max caracteres.']; 
        
        $this->validate($request, $validaciones, $mensajes);

        $alumno = new Alumno;
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->edad = $request->edad;
        $alumno->curso_id = $request->curso_id;
        $alumno->save();
        
        return redirect('/alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $alumno = Alumno::findOrFail($id);
   
       return view("alumnos.show",  compact("alumno"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        $cursos = Curso::all();
        return view("alumnos.edit",  compact("alumno", "cursos"));
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
        $validaciones =['nombre' => ['required','max:100']];
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.', 'nombre.unique' => 'Ese :attribute ya está dado de alta.', 'nombre.max' => 'El campo :attribute no puede tener más de :max caracteres.']; 
    
        $this->validate($request, $validaciones, $mensajes);

        $alumno = Alumno::findOrFail($id);;
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->edad = $request->edad;
        $alumno->curso_id = $request->curso_id;
        $alumno->save();

        return redirect('/alumnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();

        return redirect('/alumnos');
    }

    public function borrar($id){
        $alumno = Alumno::destroy($id);

        return redirect('/alumnos');
    }
}
