<?php include('resources/Views/layouts/header.php'); ?>
<div class="d-flex justify-content-between">
  <div> <h1>Editar de Documentos</h1></div>
  <div><a href="/logout" class="btn btn-danger btn-sm" role="button">Cerrar Sessión</a></div>
</div>
<!-- Formulario Editar Registro de Documentos -->
<form action="/documents/update" method="POST">
  <div class="mb-3">
    <label for="DOC_NOMBRE" class="form-label">DOC_NOMBRE</label>
    <input type="text" class="form-control" id="DOC_NOMBRE" name="DOC_NOMBRE" value="<?php echo $document->DOC_NOMBRE; ?>" autocomplete="off" required>
    <input type="hidden" name="id" value="<?php echo $document->DOC_ID; ?>">
  </div>

  <div class="mb-3">
    <label for="DOC_ID_PROCESO" class="form-label">DOC_ID_PROCESO</label>
    <select class="form-select" aria-label="Default" name="DOC_ID_PROCESO">
      <?php foreach ($pro_procesos as $proceso) { ?>
        <option value="<?php echo "{$proceso->PRO_ID}"; ?>" <?php if ($proceso->PRO_ID == $document->DOC_ID_PROCESO) echo 'selected'; ?>><?php echo "{$proceso->PRO_NOMBRE}"; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="DOC_ID_TIPO" class="form-label">DOC_ID_TIPO</label>
    <select class="form-select" aria-label="Default" name="DOC_ID_TIPO">
      <?php foreach ($tip_tipos as $tip_tipo) { ?>
        <option value="<?php echo "{$tip_tipo->TIP_ID}"; ?>" <?php if ($tip_tipo->TIP_ID == $document->DOC_ID_TIPO) echo 'selected'; ?>><?php echo "{$tip_tipo->TIP_NOMBRE}"; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="DOC_CONTENIDO" class="form-label">DOC_CONTENIDO</label>
    <textarea class="form-control" id="DOC_CONTENIDO" name="DOC_CONTENIDO" rows="3" autocomplete="off" required><?php echo $document->DOC_CONTENIDO; ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button> || <a href="/documents" class="btn btn-secondary">Cancelar</a>
</form>
<?php include('resources/Views/layouts/footer.php'); ?>
