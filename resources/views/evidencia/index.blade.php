@extends('layouts.app')

@section('content')
<div class="container">

<div class="alert alert-success alert-dismissible" role="alert">
   @if(Session::has('mensaje'))
    {{ Session::get('mensaje')}}

    @endif

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>



<a href="{{ url('evidencia/create')}}" class="btn btn-success"> Registrar nueva evidencia de aspirante </a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Año de graduado</th>
            <th>Direccion</th>
            <th>Area de Trabajo</th>
            <th>Fotocopia del titulo</th>
            <th>Acta de Solicitud</th>
            <th>Acciones</th>

        </tr>
    </thead>


    <tbody>
        @foreach( $evidencias as $evidencia)

        <tr>
            <td>{{ $evidencia->idEvidencia }}</td>
            <td>{{ $evidencia->Nombre }}</td>
            <td>{{ $evidencia->Apellido }}</td>
            <td>{{ $evidencia->AnnoGraduado }}</td>
            <td>{{ $evidencia->Direccion }}</td>
            <td>{{ $evidencia->AreaTrabajo }}</td>

            <td>
          <img src="{{ asset('storage').'/'.$evidencia->FotocopiaTitulo}}"   width="200" >

            <td>
          <img src="{{ asset('storage').'/'.$evidencia->ActaSolicitud}}"  width="200" >
          <!-- <input type="submit" class="btn btn-primary" value="Mostrar Acta"> -->
            </td>
            <td>{{ $evidencia->EdicionMaestria }}</td>
            <td>

            <a href="{{ url('/evidencia/'.$evidencia->id.'/edit') }}" class="btn btn-secondary" >
                Editar
            </a>

            |

            <form action="{{ url('/evidencia/'.$evidencia->id ) }}"method="post" class="d-inline">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Desea eliminar la evidencia?')" value="Borrar" class="btn btn-danger">

            </form> </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>

<img src="{{ asset('images/imagen1.png  ') }}" alt="Imagen de ejemplo">
@endsection