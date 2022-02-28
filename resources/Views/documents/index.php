<?php include('resources/Views/layouts/header.php'); ?>
<div class="d-flex justify-content-between">
  <div>
    <h1>Listado de Documentos</h1>
  </div>
  <div><a href="/logout" class="btn btn-danger btn-sm" role="button">Cerrar Sessión</a></div>
</div>
<a href="/documents/create" class="btn btn-primary mt-4 mb-4">Registrar Documento</a>
<table id="documents" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Codigo</th>
      <th scope="col">Contenido</th>
      <th scope="col">Tipo</th>
      <th scope="col">Proceso</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (is_array($documents) || is_object($documents)) {
      foreach ($documents as $document) {
    ?>
        <tr>
          <th scope="row"><?php echo "{$document->DOC_ID}"; ?></th>
          <td><?php echo "{$document->DOC_NOMBRE}"; ?></td>
          <td><?php echo "{$document->DOC_CODIGO}"; ?></td>
          <td><?php echo "{$document->DOC_CONTENIDO}"; ?></td>
          <td>
            <?php echo "(" .
              $document->tip_tipo->TIP_PREFIJO . ") " . $document->tip_tipo->TIP_NOMBRE;
            ?>
          </td>
          <td>
            <?php echo "(" .
              $document->pro_proceso->PRO_PREFIJO . ") " . $document->pro_proceso->PRO_NOMBRE;
            ?>
          </td>
          <td>
            <a href='<?php echo '/documents/edit/' . $document->DOC_ID; ?>' class="btn btn-warning">editar</a>
            <a href='<?php echo '/documents/delete/' . $document->DOC_ID; ?>' class="btn btn-danger">Borrar</a>
          </td>
        </tr>
    <?php
        //Cerrar if + foreaah
      }
    }
    ?>
  </tbody>
</table>
<?php include('resources/Views/layouts/footer.php'); ?>
