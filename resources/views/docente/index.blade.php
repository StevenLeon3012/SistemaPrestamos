@extends('layouts.app')
@section('content')
<script>

    function mostrarPopUp(){
        document.getElementById("popup-1").classList.toggle("active");
    }

</script>
<div id="content" class="container-fluid py-4" style="margin-left: 30vh">
    <div class="row m-4" style="width:60vw;">
    <div class="col-12">
        <div class="row">
            <div class="col-1" style="margin-right: 85vh">
                <h5>DOCENTES</h5>
            </div>
            <div class="col-2">
                <a href="{{ route('docente.create') }}" type="button" class="btn modal-btn" style="background-color: #94c83d">
                    Nuevo Docente
                </a>
            </div>
            <div class="col-11">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col" style="text-align: center;">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($docentes as $docente)
                                @if($docente->disponibilidad)
                                    <tr>
                                        <th scope="row">{{ $docente->id }}</th>
                                        <td>{{ $docente->name }}</td>
                                        <td>{{ $docente->telefono }}</td>
                                        <td>{{ $docente->email }}</td>
                                        <td style="width: 40vh; text-align: center;">
                                            <div class="d-grid gap-2 d-md-block">
                                                <a href="{{ route('docente.edit', $docente->id) }}" type="button" class="btn" style="background-color: #94c83d">
                                                    EDITAR
                                                </a>
                                                <button onclick="mostrarPopUp()" type="button" class="btn btn-danger">
                                                    Eliminar
                                                </button>
                                                <div class="popup" id="popup-1">
                                                    <div class="overlay"></div>
                                                    <div class="contenido">
                                                        <h3 style="margin-bottom: 3vh">¿Deseas eliminar el docente número {{ $docente->id }}?</h3>
                                                        <form action="{{ route('docente.update', $docente->id) }}" method="POST" style="display:inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="name" value="{{ $docente->name }}">
                                                            <input type="hidden" name="disponibilidad" value="0">
                                                            <input type="hidden" name="email" value="{{ $docente->email }}">
                                                            <input type="hidden" name="telefono" value="{{ $docente->telefono }}">
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                        <a type="button" style="background-color: #94c83d" class="btn" onclick="mostrarPopUp()">Cancelar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
