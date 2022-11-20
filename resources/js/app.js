

 require('./bootstrap');

 import Vue from 'vue';
 

 
 Vue.component('registro-pacientes', require('./components/registroPacientes.vue').default);
 Vue.component('historial-pacientes', require('./components/historialPacientes.vue').default);
 Vue.component('informe-diarios', require('./components/informeDiarios.vue').default);
 Vue.component('informe-doctor', require('./components/informeDoctores.vue').default);
 Vue.component('registro-doctores', require('./components/registroDoctores.vue').default);
 Vue.component('especialidad-doctor', require('./components/especialidadDoctor.vue').default);
 Vue.component('perfil-usuario', require('./components/perfilUsuario.vue').default);
 Vue.component('vista-usuario', require('./components/vistaUsuarios.vue').default);
 
 
 const app = new Vue({
     el: '#app',
     data :{
         menu:0
     }
 });
 