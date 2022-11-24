<template>
    <div class="container-fluid py-4">
        <div class="row min-vh-80">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h5 class="text-white text-capitalize ps-3">Historial del Paciente</h5>
                </div>
              </div>
              <div class="card-body">
                <div class="form-check form-check-info text-start ps-0">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
                  <label class="form-check-label" for="flexCheckDefault">
                    Cedula
                  </label>
                
                 
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
                  <label class="form-check-label" for="flexCheckDefault">
                      Nombre
                  </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input type="text" class="form-control" placeholder="Ingrese el Parametro a Buscar">
                </div>

              </div>
            </div>
          </div>
        </div>
     
      </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Componente del Historial de Pacientes.')
        }
    }
</script>
