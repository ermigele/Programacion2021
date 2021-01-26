<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use SoftDeletes;
    public $timestamps = false;

    
    public function departamento() {
        return $this.belongsTo("App\departamento", "departamento"); 
    }
}

?>