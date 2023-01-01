@extends('home')
@section('contenido')
<template v-if="menu==1">
    <registro-pacientes></registro-pacientes>
</template>

<template v-if="menu==2">
    <historial-pacientes></historial-pacientes>
</template>

<template v-if="menu==3">
    <informe-diarios></informe-diarios>
</template>

<template v-if="menu==4">
    <informe-doctor></informe-doctor>
</template>

<template v-if="menu==5">
    <registro-doctores></registro-doctores>
</template>

<template v-if="menu==6">
    <especialidad-doctor></especialidad-doctor>
</template>

<template v-if="menu==7">
    <perfil-usuario></perfil-usuario>
</template>

<template v-if="menu==8">
    <vista-usuario></vista-usuario>
</template>

@endsection