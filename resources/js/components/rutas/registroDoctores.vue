<template>
    <div class="container-fluid py-4">
        <div class="row min-vh-80">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h5 class="text-white text-capitalize ps-3">Registro de Doctores</h5>
                </div>
              </div>
              <div class="card-body">
                <form role="form">
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Cedula">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="email" class="form-control" placeholder="Nombre">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Correo">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Fecha de Nacimiento">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Telefono">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="number" class="form-control" placeholder="Nro de Registro">
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Registrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
     
      </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Componente del Registro de Doctores.')
        }
    }
</script>
