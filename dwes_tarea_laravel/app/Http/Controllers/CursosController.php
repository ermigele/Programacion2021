<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Curso;
use App\Categoria;
use App\Alumno;
use DB;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        //dd($cursos->first()->alumnos()->count());
       // $cursos= DB::select('SELECT * from cursos');
       // $alumnos =  DB::select('SELECT * FROM alumnos');
        return view("cursos.lista", compact("cursos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view("cursos.create", compact("categorias"));
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
        Curso::all();
        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->horas = $request->horas;
        $curso->plazas = $request->plazas;
        $curso->categoria_id = $request->categoria_id;
        $curso->save(); 
        
        return redirect('/cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $curso = Curso::findOrFail($id);
       $alumnos = DB::select('SELECT * FROM alumnos WHERE curso_id='.$id);
       
       return view("cursos.show",  compact("curso", "alumnos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view("cursos.edit",  compact("curso"));
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
        $alumnos = DB::select('SELECT * FROM alumnos WHERE curso_id='.$id);
        
        $validaciones =['nombre' => ['required','max:100']];
        if(count($alumnos) > 0){
            $validaciones['plazas'] = [ 'required', 'min:'.count($alumnos)];
        }
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.', 
            'nombre.unique' => 'Ese :attribute ya está dado de alta.', 'nombre.max' => 'El campo :attribute no puede tener más de :max caracteres.', 
             'plazas.min' => 'El campo :attribute no puede tener menos de :min alumnos.']; 
 
        $this->validate($request, $validaciones, $mensajes);

        $curso = Curso::findOrFail($id);;
        $curso->nombre = $request->nombre;
        $curso->horas = $request->horas;
        $curso->plazas = $request->plazas;
        $curso->save();

        return redirect('/cursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        return redirect('/cursos');
    }

    public function borrar($id){
        $curso = Curso::destroy($id);
        return redirect('/cursos');
    }
       
}
