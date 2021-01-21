<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\centro;
use App\departamento;
use App\empleado;

class MiPrimerController extends Controller
{

    /*
    public function inicio()
    {
        return view('quienessomos')->with('nombre', 'miguel');
    }


    public function final($nombre)
    {
        //return view('dondeestamos',[nombre=>'miguel']);
        return view('dondeestamos',compact('nombre'));
    }

    public function contenido()
    {
        return view('/layout/prueba');
    } */

    public function mostrarEmpleados()
    {
        $empleados = DB::select("SELECT * FROM empleados");
        return view("listadoEmpleados")->with("empleados", $empleados);
    }

    public function mostrarCentros()
    {
        $centros = Centro::all();
        return view("listadoCentros", compact('centros'));
    }

    public function empleados()
    {
        $empleados = empleado::Where("hijos", ">=", 3)
            ->where("salario", "<=", 20000)
            ->orderBy("nombre", "desc")
            ->take(5)
            ->get();
        return view("contenido", compact('empleados'));
    }

    public function insertar(Request $request)
    {
        $centro = new centro;
        $centro->nombre = "SEDE NUEVA";
        $centro->direccion = "direccion la que sea";
        $centro->save();
        //return view("contenido", compact('empleados'));
    }

    public function actualizar(Request $request)
    {
        $centro = centro::find(4);
        $centro->direccion = "nueva direccion";
        $centro->save();
        //return view("contenido", compact('empleados'));
    }

    public function actualizacionmasiva()
    {
        empleado::Where("hijos", ">=", 3)
            ->where("salario", "<=", 20000)
            ->update("salario", 30000);
        return view("contenido", compact('empleados'));
    }

    public function borrar()
    {
        $centro = centro::find(5);
        $centro->delete;
    }

    public function restaurar()
    {
        centro::OnlyTrashed()->restore();
    }

    public function borradoDefinitivo()
    {
        $centro = centro::find(5);
        $centro->forcedelete;
    }

    public function departamentosCentro()
    {
        $departamentos = centro::find(1)->departamentos;
        return $departamentos;
    }

    public function departamentos()
    {
        $departamentos = centro::with('departamentos')->get();
        return $centros;
    }
}
