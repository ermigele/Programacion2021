<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    //
    public $timestamps = false;

    public function centro() {
        return $this.belongsTo("App\centro", "centro"); 
    }

    public function empleados() {
        return $this.hasMany("App\empleado", "empleado");
    }
}

?>