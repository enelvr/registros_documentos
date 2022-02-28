<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipTipoDoc extends Model {

  protected $table = 'TIP_TIPO_DOC';
  protected $fillable = [
    'TIP_ID', 'TIP_NOMBRE', 'TIP_PREFIJO'
  ];

  protected $primaryKey = 'TIP_ID';

}
