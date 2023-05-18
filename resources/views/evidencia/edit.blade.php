@extends('layouts.app')

@section('content')
<div class="container">




<form action="{{ url('/evidencia/'.$evidencia->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH')}}

@include('evidencia.form',['modo'=>'Editar'])

</form>
</div>
@endsection