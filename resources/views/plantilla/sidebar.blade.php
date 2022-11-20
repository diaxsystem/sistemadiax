<div class="sidenav-header">
  <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
  <a class="navbar-brand m-0" href="#">
    <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
    <span class="ms-1 font-weight-bold text-white">Sistema Diax</span>
  </a>
</div>
<hr class="horizontal light mt-0 mb-1">
<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white active bg-gradient-primary" @click='menu=1' href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">dashboard</i>
        </div>
        <span class="nav-link-text ms-1">Registro de Pacientes</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " @click='menu=2' href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">table_view</i>
        </div>
        <span class="nav-link-text ms-1">Historial del Paciente</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " @click='menu=3' href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">receipt_long</i>
        </div>
        <span class="nav-link-text ms-1">Informes Diarios</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " @click='menu=4' href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">view_in_ar</i>
        </div>
        <span class="nav-link-text ms-1">Informes Doctores</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " @click='menu=5' href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
        </div>
        <span class="nav-link-text ms-1">Registro de Doctores</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " @click='menu=6' href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">notifications</i>
        </div>
        <span class="nav-link-text ms-1">Especialidad Doctor</span>
      </a>
    </li>
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Paginas del Usuario</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " @click='menu=7' href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">person</i>
        </div>
        <span class="nav-link-text ms-1">Perfil</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " @click='menu=8' href="#">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">login</i>
        </div>
        <span class="nav-link-text ms-1">Usuarios</span>
      </a>
    </li>
    <form action="/logout" method="GET">
    <li class="nav-item">
      <a class="nav-link text-white " href="#" onclick="this.closest('form').submit()">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">assignment</i>
        </div>
        <span class="nav-link-text ms-1">Cerrar Sesión</span>
      </a>
    </li>
  </form>
  </ul>
</div>