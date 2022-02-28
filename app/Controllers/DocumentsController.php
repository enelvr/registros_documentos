<?php

namespace App\Controllers;

use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;

class DocumentsController
{

  public function index()
  {

    try {
      $documents = DocDocumento::get();
      include 'resources/Views/documents/index.php';
      //$this->render('index', ['documents' => $documents]);
    } catch (\Throwable $th) {
      print($th);
    }
  }

  public function create()
  {
    try {

      $pro_procesos = ProProceso::get();
      $tip_tipos = TipTipoDoc::get();

      include 'resources/Views/documents/create.php';
    } catch (\Throwable $th) {
      print($th);
    }
  }

  public function store()
  {
    try {
      if (!isset($_POST)) redirect('errors', '/documents', 'Todos los campos son requeridos');

      $data = (object) $_POST;

      $document = new DocDocumento;
      $document->DOC_NOMBRE       = $this->validateInput($data->DOC_NOMBRE);
      $document->DOC_CODIGO       = generateConsecutive($data->DOC_ID_PROCESO, $data->DOC_ID_TIPO);
      $document->DOC_CONTENIDO    = $data->DOC_CONTENIDO;
      $document->DOC_ID_TIPO      = $data->DOC_ID_TIPO;
      $document->DOC_ID_PROCESO   = $data->DOC_ID_PROCESO;
      $document->save();

      redirect('success', '/documents', 'Documento registrado con éxito');
    } catch (\Throwable $th) {
      error_log(500, 'DocumentsController - Store', $th->getMessage());
      redirect('errors', '/documents', $th->getMessage());
    }
  }

  public function edit(INT $id)
  {
    try {

      $document = DocDocumento::find($id);
      $pro_procesos = ProProceso::get();
      $tip_tipos = TipTipoDoc::get();

      include 'resources/Views/documents/edit.php';
    } catch (\Throwable $th) {
      error_log(500, 'DocumentsController - Edit', $th->getMessage());
      redirect('errors', '/documents', $th->getMessage());
    }
  }

  public function update()
  {
    try {

      if (!isset($_POST)) redirect('errors', '/documents', 'Todos los campos son requeridos');

      $data = (object) $_POST;

      $document = DocDocumento::find($data->id);
      $document->DOC_NOMBRE       = $data->DOC_NOMBRE;

      if (($document->DOC_ID_TIPO != $data->DOC_ID_TIPO) || ($document->DOC_ID_PROCESO != $data->DOC_ID_PROCESO)) {
        $document->DOC_CODIGO       = generateConsecutive($data->DOC_ID_PROCESO, $data->DOC_ID_TIPO);
      }
      $document->DOC_CONTENIDO    = $data->DOC_CONTENIDO;
      $document->DOC_ID_TIPO      = $data->DOC_ID_TIPO;
      $document->DOC_ID_PROCESO   = $data->DOC_ID_PROCESO;
      $document->save();

      redirect('success', '/documents', 'Documento actualizado con éxito');
    } catch (\Throwable $th) {
      error_log(500, 'DocumentsController - Update', $th->getMessage());
      redirect('errors', '/documents', $th->getMessage());
    }
  }

  public function destroy(INT $id)
  {
    try {

      $document = DocDocumento::find($id);
      $document->delete();
      redirect('success', '/documents', 'Documento eliminado con éxito');
    } catch (\Throwable $th) {
      error_log(500, 'DocumentsController - Destroy', $th->getMessage());
      redirect('errors', '/documents', $th->getMessage());
    }
  }

  public function validateInput($input)
  {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return $input;
  }
}
