<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocDocumento extends Model {

  protected $table = 'DOC_DOCUMENTO';
  protected $fillable = [
    'DOC_ID', 'DOC_NOMBRE', 'DOC_CODIGO', 'DOC_CONTENIDO', 'DOC_ID_TIPO', 'DOC_ID_PROCESO'
  ];

  protected $primaryKey = 'DOC_ID';

  //Relaciones entres tablas

  public function pro_proceso() {
    return $this->belongsTo('App\Models\ProProceso', 'DOC_ID_PROCESO', 'PRO_ID');
  }

  public function tip_tipo() {
    return $this->belongsTo('App\Models\TipTipoDoc', 'DOC_ID_TIPO', 'TIP_ID');
  }
}
