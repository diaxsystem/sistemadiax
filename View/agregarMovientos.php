<?php
require_once("../includes/header_admin.php");
require_once('../Controllers/grabarMovimientos.php');
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Agregar Gasto <i class="typcn typcn-calculator"></i></h4>
                            <p class="card-description text-center">
                                Datos del gasto a grabar
                            </p>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="forma_pago">Tipo de Transacción</label>
                                    <select name="forma_pago" id="forma_pago" class="form-control">
                                        <option value="Deposito">Deposito</option>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Efectivo">Efectivo</option>
                                    </select>
                                </div>

                                <div class="form-group" id="mov">
                                    <label class="control-label">Nro de Transacción</label>
                                    <input class="form-control" type="text" name="nro_cheque" id="nro_cheque" placeholder="Ingrese la el numero de Transacción">
                                </div>


                                <div class="form-group">
                                    <label class="control-label" for="tipo_salida">Tipo de Movimiento</label>
                                    <select name="tipo_salida" id="tipo_salida" class="form-control">
                                        <option value="Egreso">Egreso</option>
                                        <option value="Ingreso">Ingreso</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Cantidad de Monto</label>
                                    <input class="form-control" type="text" name="monto" id="monto" placeholder="Ingrese el monto">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="fecha">Fecha de Movimiento</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control">

                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="concepto">Concepto de Pago</label>
                                    <textarea type="text" name="concepto" id="concepto" class="form-control" placeholder="Ingrese el concepto del Gasto" style="max-height: 145px;">
                            </textarea>
                                </div>


                                <input class="form-control" type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['nombre']; ?>">
                                <input class="form-control" type="hidden" name="estatus" id="estatus" value="1">

                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar
                                    </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="../Templates/movimientosFinacieros.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>

                                </div>
                            </form>
                            <br>
                            <?php if (isset($alert)) { ?>
                                <div class="alert alert-info"><?php echo  $alert; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php include('../includes/footer_admin.php'); ?>

            <script type="text/javascript">
                const valor = document.querySelector('#forma_pago');
                document.getElementById('mov').style.display = 'none';

                console.log(valor);

                /*OBTENER VALOR SELECCIONADO DE LA LISTA DE OPCIONES*/
                valor.addEventListener('change', function() {
                    let valorOptions = valor.value;

                    var opctionSelect = valor.options[valor.selectedIndex];

                    console.log('Opciones: ' + opctionSelect.text);
                    console.log('Opciones: ' + opctionSelect.value);

                    if (opctionSelect.value === 'Cheque') {
                        document.getElementById('mov').style.display = 'block';
                    } else if (opctionSelect.value === 'Transferencia') {
                        document.getElementById('mov').style.display = 'block';
                    } else {
                        document.getElementById('mov').style.display = 'none';
                    }
                });
            </script>