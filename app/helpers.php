<?php

use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;

//Creamos el codigo consecutivo del documento
if(! function_exists('generateConsecutive')) {
  function generateConsecutive($pro, $tip) {
    $consecutive = DocDocumento::where('DOC_ID_PROCESO', $pro)->where('DOC_ID_TIPO', $tip)->latest()->first();
    if($consecutive === null) {
      $pro = ProProceso::find($pro);
      $tip = TipTipoDoc::find($tip);
      return $tip->TIP_PREFIJO . '-' . $pro->PRO_PREFIJO . '-1';
    }
      $number = preg_replace('/[^0-9]/', '', $consecutive->DOC_CODIGO);

      $number++;

      return $consecutive->tip_tipo->TIP_PREFIJO . '-' . $consecutive->pro_proceso->PRO_PREFIJO . '-' . $number;
  }
}

if(! function_exists('hashPassword')) {
  function hashPassword($password) {
    try{
      return password_hash($password, PASSWORD_DEFAULT);
    }catch(\Throwable $th){
        return NULL;
    }
  }
}

if(! function_exists('comparePassword')) {
  function comparePassword(INT $current, INT $password) {
    try{
      if ($current === $password) {
        return true;
      }
      return false;
    }catch(\Throwable $th){
        return false;
    }
  }
}

if(! function_exists('alerts')) {
  function alerts() {
   if(isset($_SESSION['errors'])):
     echo '
      <ul class="alert alert-danger alert-dismissible fade show px-2" role="alert">';
          if (is_array($_SESSION['errors']) || is_object($_SESSION['errors'])) {
            foreach($_SESSION['errors'] as $error) {
              echo '<li>' . $error . '</li>';
            }
          }
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </ul>';
      $_SESSION['errors'] = null;
    endif;

  if(isset($_SESSION['success'])):
    echo '
     <ul class="alert alert-success alert-dismissible fade show pe-4" role="alert">';
         if (is_array($_SESSION['success']) || is_object($_SESSION['success'])) {
           foreach($_SESSION['success'] as $success) {
             echo '<li class="pe-4">' . $success . '</li>';
           }
         }
       echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </ul>';
     $_SESSION['success'] = null;
   endif;
  }
}

if(! function_exists(('redirect'))) {
  function redirect($type, $url, $data = null) {
    if(!is_null($data)){
      $_SESSION[$type] = (object) $data;
    }

   header('location: ' . $url);
  }
}

if(! function_exists('isLogin')) {
  function isLogin() {
    if(empty($_SESSION['user'])) {
      redirect('errors', '/login', 'Debes iniciar sesión para ingresar al sistema');
      exit();
    }
    $user = unserialize($_SESSION['user']);
  }
}
