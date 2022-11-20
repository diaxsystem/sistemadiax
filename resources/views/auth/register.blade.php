@extends('layouts.app')

<body class="">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Registrarme</h4>
                                    <p class="mb-0">Ingrese su correo para Registrarse</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('register') }}">
                                      @csrf

                                      <div class="input-group input-group-outline mb-3">
                                            <label for="cedula" class="form-label">{{ __('Cedula') }}</label>
                                            <input id="cedula" type="text"
                                                class="form-control @error('cedula') is-invalid @enderror"
                                                name="cedula" value="{{ old('cedula') }}" required
                                                autocomplete="cedula" autofocus>
                                            @error('cedula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="name">{{ __('Nombre') }}</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="email">{{ __('Correo') }}</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <label for="password-confirm"
                                                class="form-label">{{ __('Confirmar Contraseña') }}</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label for="fecha_nac" class="form-label">{{ __('Fecha de Nacimiento') }}</label>
                                            <input id="fecha_nac" type="date"
                                                class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac"
                                                value="{{ old('fecha_nac') }}" required autocomplete="fecha_nac" autofocus>
                                            @error('fecha_nac')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
                                            <input id="telefono" type="text"
                                                class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                                value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                            @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <label for="sexo" class="form-label">{{ __('Sexo') }}</label>
                                            <input id="sexo" type="text"
                                                class="form-control @error('sexo') is-invalid @enderror" name="sexo"
                                                value="{{ old('sexo') }}" required autocomplete="sexo" autofocus>
                                            @error('sexo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                            <p class="mb-2 text-sm mx-auto">
                                                Ya tiene una Cuenta ?
                                                <a class="text-primary text-gradient font-weight-bold" href="{{ route('login') }}">{{ __('Inicio') }}</a>
                                            </p>
                                        </div>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
        damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.4') }}"></script>