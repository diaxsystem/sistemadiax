<?php
require_once("../includes/header_admin.php");
require_once('../Controllers/modificarEstudios.php');
?>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Modificar Estudio <i class="typcn typcn-flow-children"></i></h4>
              <p class="card-description text-center">
                Datos del estudio a modificar
              </p>
              <form class="forms-sample" method="POST" action="">
              <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
                <div class="form-group">
                  <input class="form-control" type="hidden" name="Estudio" id="Estudio" placeholder="Ingrese el Estudio" 
                   value="<?php echo $Estudio; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label"> Estudio</label>
                  <input class="form-control" type="text" name="Estudio" id="Estudio" placeholder="Ingrese el monto" required
                  value="<?php echo $Estudio; ?>">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Sin Seguro</label>
                  <input class="form-control" type="text" name="SinSeguro" id="SinSeguro" placeholder="Ingrese el monto" required 
                  value="<?php echo $SinSeguro; ?>">
                </div>

                <div class="form-group">
                  <label class="control-label">Semei</label>
                  <input class="form-control" type="text" name="SEMEI" id="SEMEI" placeholder="Ingrese el monto" required
                  value="<?php echo $SEMEI; ?>">
                </div>

                <div class="form-group">
                  <label class="control-label">Precio Preferencial</label>
                  <input class="form-control" type="text" name="SemeiPref" id="SemeiPref" placeholder="Ingrese el monto" required
                  value="<?php echo $SemeiPref; ?>">
                </div>

                <div class="form-group">
                  <label class="control-label">Seguros</label>
                  <input class="form-control" type="text" name="Seguros" id="Seguros" placeholder="Ingrese el monto" required 
                  value="<?php echo $Seguros; ?>">
                </div>

                <div class="form-group">
                  <label class="control-label">Seguros Preferencial</label>
                  <input class="form-control" type="text" name="SegurosPref" id="SegurosPref" placeholder="Ingrese el monto" required 
                  value="<?php echo $SegurosPref; ?>">
                </div>

                <div class="form-group">
                  <label class="control-label">Precio Hospitalarios</label>
                  <input class="form-control" type="text" name="Hospitalar" id="Hospitalar" placeholder="Ingrese el monto"
                  value="<?php echo $Hospitalar; ?>">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a class="btn btn-light" href="../Templates/estudios.php">Cancelar</a>
                <br>
                <?php if ($alert != "") {  ?>
                  <div class="btn btn-outline-primary btn-lg w-100 mt-4 mb-0">
                    <p style="color:#fff;">
                      <?php echo $alert; ?>
                    </p>
                  </div>
                <?php } ?>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php include('../includes/footer_admin.php'); ?>