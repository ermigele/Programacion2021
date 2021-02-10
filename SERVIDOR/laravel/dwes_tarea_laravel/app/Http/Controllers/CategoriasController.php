<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;
use DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias= DB::select('select * from categorias');
        return view("categorias.lista", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("categorias.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorias= DB::select("SELECT * FROM categorias WHERE nombre='".$request->nombre."'");
        if(count($categorias) > 0)
            return redirect('/categorias/create')->withErrors(["error"=>"La Categoria ya existe"]);;
   
        $validaciones =['nombre' => ['required','max:100']];
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.', 
            'nombre.unique' => 'Ese :attribute ya está dado de alta.', 
            'nombre.max' => 'El campo :attribute no puede tener más de :max caracteres.'
        ]; 
 
        $this->validate($request, $validaciones, $mensajes);

        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view("categorias.show", compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $categoria = Categoria::findOrFail($id);
       return view("categorias.edit", compact('categoria'));
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

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
    
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect('/categorias');
    }

    public function borrar($id){
        if (Categoria::find($id)->cursos()->count() === 0) {
            $categoria = Categoria::destroy($id);
            return redirect('/categorias');
        }
        return redirect('/categorias')->withErrors(["error"=>"No se puede eliminar por tener cursos asociados"]);
    }
        
}
