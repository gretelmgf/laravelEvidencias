    <h1> {{$modo}} evidencia</h1>
   
    @if(count($errors)>0)

        <div class="alert alert-danger" role="alert">
      <ul>  
        @foreach( $errors->all() as $error)
         <li>   {{ $error }} </li>
        @endforeach
</ul>
        </div>
       
    @endif


    <div class="form-group">

    <label for="Nombre"> Nombre </label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($evidencia->Nombre)?$evidencia->Nombre:old('Nombre') }}" id="Nombre">
   
    </div>

    <div class="form-group">
    <label for="Apellido"> Apellido </label>
    <input type="text" class="form-control" name="Apellido" value="{{ isset($evidencia->Apellido)?$evidencia->Apellido:old('Apellido') }}" id="Apellido">
    </div>
    

    <div class="form-group">
    <label for="AnnoGraduado"> Año de Graduado </label>
    <input type="text" class="form-control" name="AnnoGraduado" value="{{ isset($evidencia->AnnoGraduado)?$evidencia->AnnoGraduado:old('AnnoGraduado') }}" id="AnnoGraduado">
    
    </div>

    <div class="form-group">
    <label for="Direccion"> Direccion </label>
    <input type="text" class="form-control" name="Direccion" value="{{ isset($evidencia->Direccion)?$evidencia->Direccion:old('Direccion') }}" id="Direccion">
    
    </div>

    <div class="form-group">
    <label for="AreaTrabajo"> Area de Trabajo </label>
    <input type="text" class="form-control" name="AreaTrabajo" value="{{ isset($evidencia->AreaTrabajo)?$evidencia->AreaTrabajo:old('AreaTrabajo') }}" id="AreaTrabajo">
    </div>
   
    
    <!-- <label for="FotocopiaTitulo"> Fotocopia del Titulo </label>
    @if(isset($evidencia->ActaSolicitud))
     {{ $evidencia->FotocopiaTitulo }}
    <input type="file" name="FotocopiaTitulo" value="" id="FotocopiaTitulo">
    @endif -->
   

    
    <!-- <label for="ActaSolicitud"> Acta Solicitud </label>
    @if(isset($evidencia->ActaSolicitud))
     {{ $evidencia->ActaSolicitud }} 
    <input type="file" name="ActaSolicitud" id="ActaSolicitud">
    @endif
    <br> -->

    
    <div class="form-group">
    <label for="FotocopiaTitulo"> Fotocopia del Titulo </label>
    

    <input type="file" class="form-control" name="FotocopiaTitulo" id="FotocopiaTitulo">
    
    </div>

    <div class="form-group">
    <label for="ActaSolicitud"> Acta de Solicitud </label>

    <input type="file" class="form-control" name="ActaSolicitud" id="ActaSolicitud">
</div>
    



    <div class="form-group">
    <label for="EdicionMaestria"> Edicion de la Maestria </label>
    <input type="text" class="form-control" name="EdicionMaestria" value="{{ isset($evidencia->EdicionMaestria)?$evidencia->EdicionMaestria:old('EdicionMaestria') }}" id="EdicionMaestria">
</div>
    <br>
    <input type="submit" class="btn btn-success" value="{{ $modo }} datos">
    

    <a href="{{ url('evidencia')}}" class="btn btn-primary" > Regresar </a>
