<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url('props/bootstrap/css/bootstrap.min.css') ?>">
  <title>inventario repuesto</title>
</head>
<body  >
	<div class="container form-control col-md-4">  


   <?php foreach ($usuario as $valor) { ?>
    <form action="<?php echo base_url('usuario_controller/actualizar') ?>" method="POST" autocomplete="off" >
     <div>
      <input type="hidden" name="id" value="<?= $valor->id_usuario ?>">
      <div class="row">
        <div class="col">
          <label style="font-size: 100%; font-family: arial; ">ACTUALICE EL REGISTRO </label>  </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="date"  style="font-size: 100%; font-family: arial; font-weight: 700; margin-top: 10px;">Correo</label>
        </div>
        <div class="col">
          <input type="text" class="form-control pull-right"  name="correo" required value="<?= $valor->correo ?>">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="date"  style="font-size: 100%; font-family: arial; font-weight: 700; margin-top: 10px;">Clave</label>
        </div>
        <div class="col">
          <input type="text" class="form-control pull-right"  name="clave" required value="<?= $valor->clave ?>">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="date"  style="font-size: 100%; font-family: arial; font-weight: 700; margin-top: 10px;">Dui Persona</label>
        </div>
        <div class="col">
          <input type="number" class="form-control pull-right"  name="dui_persona" required value="<?= $valor->dui_persona ?>">
        </div>
      </div>
      <div class="row">
        <div class="col">
         <label for="date" style="font-size: 100%; font-family: arial; font-weight: 700; margin-top: 10px;">Rol</label>
       </div>
       <div class="col">
        <select class="form-control" name="id_rol" required>
          <option value="" class="form-control pull-right" >Seleccione rol </option>
          <?php foreach ($rol as $s) { ?>
            <option value="<?= $s->id_rol ?>" <?php if($s->id_rol==$valor->id_rol){echo "Selected";} ?>><?= $s->nombre_rol ?></option>
          <?php }  ?>
        </select>
      </div>
    </div>
    <div>
      <input type="submit" value="GUARDAR" class="btn btn-info" style="font-size: 100%; width: 100%; height: 75%;
      border-radius: 10px; margin-top: 10px;">
    </div>
  </form>
<?php } ?>
</div>
</body>
</html>