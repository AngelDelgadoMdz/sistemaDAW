<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    //Con estas líneas de código, enlazamos, por así decir, los modelos para acceder a las clases/migraciones
    public function producto(){
        return $this->belongsTo(Productos::class);
    }

}
