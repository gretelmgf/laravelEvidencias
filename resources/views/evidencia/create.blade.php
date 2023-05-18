@extends('layouts.app')

@section('content')
<div class="container">




<form action="{{ url('/evidencia')}}" method="post" enctype="multipart/form-data">
@csrf 
@include('evidencia.form',['modo'=>'Crear'])



</form>
</div>
@endsection