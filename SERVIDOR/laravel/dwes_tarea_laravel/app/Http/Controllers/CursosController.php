<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
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
        $validaciones =[
            'nombre' => ['required','max:100'],
            'horas' => 'required',
            'plazas' => 'required',
            'categoria' => 'exists:App\Models\Categoria,id',
        ];
        
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.', 
            'nombre.unique' => 'Ese :attribute ya está dado de alta.', 'nombre.max' => 'El campo :attribute no puede tener más de :max caracteres.', 
            'horas.required' =>  'El campo :attribute no puede estar vacío.',
            'plazas.required' => 'El campo :attribute no puede estar vacío.',
            'categoria.exists' => 'El campo :attribute tiene que estar asociado a una categoria']; 
            
        $this->validate($request, $validaciones, $mensajes);
    
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
        $categorias = Categoria::all();
        $curso = Curso::findOrFail($id);
        return view("cursos.edit",  compact("curso", 'categorias'));
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
       
        $validaciones =[
            'nombre' => ['required','max:100'],
            'horas' => 'required',
            'plazas' => 'required|numeric|min:'.count($alumnos),
            'categoria' => 'exists:App\Models\Categoria,id',
        ];
        
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.', 
            'nombre.unique' => 'Ese :attribute ya está dado de alta.', 'nombre.max' => 'El campo :attribute no puede tener más de :max caracteres.', 
            'horas.required' =>  'El campo :attribute no puede estar vacío.',
            'plazas.required' =>  'El campo :attribute no puede estar vacío.',
            'plazas.min' => 'El campo :attribute no puede tener menos de :min alumnos.',
            'categoria.exists' => 'El campo :attribute tiene que estar asociado a una categoria']; 
 
        $this->validate($request, $validaciones, $mensajes);

        $curso = Curso::findOrFail($id);;
        $curso->nombre = $request->nombre;
        $curso->horas = $request->horas;
        $curso->plazas = $request->plazas;
        $curso->categoria_id = $request->categoria_id;
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
        if (Curso::find($id)->alumnos()->count() === 0) {
            $curso = Curso::destroy($id);
            return redirect('/cursos');
        }
        return redirect('/cursos')->withErrors(["error"=>"No se puede eliminar por tener alumnos asociados"]);
    }
       
}
