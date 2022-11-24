<template>
    <div class="container-fluid py-4">
        <div class="row min-vh-80">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h5 class="text-white text-capitalize ps-3">Informes Diarios</h5>
                </div>
              </div>
              <div class="card-body">
                <div class="form-check form-check-info text-start ps-0">
                  <label class="form-label" for="flexCheckDefault">
                    Cedula
                  </label>
                  <input class="form-input" type="date" value=""  style="width:200px; 
                  height:35px; border: 1px solid #C70039;
                  border-radius:10px; padding:0 10px; margin:auto;">
                
                 
                  <label class="form-label" for="flexCheckDefault">
                    Nombre
                  </label>
                  <input class="form-input" type="date" value="" style="width:200px; 
                  height:35px; border: 1px solid #C70039;
                  border-radius:10px; padding:0 10px; margin:auto;">
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
            console.log('Componente del Informes Diarios.')
        }
    }
</script>
