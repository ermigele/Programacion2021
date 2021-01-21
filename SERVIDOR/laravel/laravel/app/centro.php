<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class centro extends Model
{
    //use SoftDeletes;
    // protected $table="centros_logisticos";
   // protected $primaryKey="clave_primaria";
    public $timestamps = false;

    
    public function departamentos() {
        return $this.hasMany("App\departamento", "departamento"); //si la clave primaria no fuese ide se la tendría que poner
    }

}

?>