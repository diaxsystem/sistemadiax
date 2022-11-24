

 require('./bootstrap');

 import Vue from 'vue';
 

 
 Vue.component('registro-pacientes', require('./components/rutas/registroPacientes.vue').default);
 Vue.component('historial-pacientes', require('./components/rutas/historialPacientes.vue').default);
 Vue.component('informe-diarios', require('./components/rutas/informeDiarios.vue').default);
 Vue.component('informe-doctor', require('./components/rutas/informeDoctores.vue').default);
 Vue.component('registro-doctores', require('./components/rutas/registroDoctores.vue').default);
 Vue.component('especialidad-doctor', require('./components/rutas/especialidadDoctor.vue').default);
 Vue.component('perfil-usuario', require('./components/rutas/perfilUsuario.vue').default);
 Vue.component('vista-usuario', require('./components/rutas/vistaUsuarios.vue').default);
 
 
 const app = new Vue({
     el: '#app',
     data :{
         menu:0
     }
 });
 