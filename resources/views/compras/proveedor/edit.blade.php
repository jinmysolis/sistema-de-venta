@extends('layouts.admin')



@section('content')
<div class="row">
    <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Clientes: {{$persona->nombre}}</h3>
        @if(count($errors) >0 )
        <div class="alert alert-danger">
            
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        </div> 
  </div>   
        {!!Form::model($persona,['route'=>['compras.proveedor.update',$persona->idpersona],'method'=>'PUT'])!!}
        <div class="row">
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('nombre', 'Nombre')!!}
                    {!!Form::text('nombre', null,['class'=>'form-control',' placeholder'=>' introduzca el articulo tipo de persona'])!!}

                   </div>
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('direccion', 'Direccion')!!}
                    {!!Form::text('direccion', null,['class'=>'form-control',' placeholder'=>' introduzca la Direccion'])!!}

                   </div>
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label >Documento</label>
                        <select name="tipo_documento" class="form-control">
                           @if ($persona->tipo_documento=='CID')
                           <option value="CID" selected>Cedula</option>
                            <option value="RIF">Rif</option>
                            <option value="PASS">Pasaporte</option>
                            
                            @elseif ($persona->tipo_documento=='RIF')
                           <option value="CID" >Cedula</option>
                            <option value="RIF" selected>Rif</option>
                            <option value="PASS">Pasaporte</option>
                            
                           @else ($persona->tipo_documento=='PASS')
                           <option value="CID" >Cedula</option>
                            <option value="RIF">Rif</option>
                            <option value="PASS"selected>Pasaporte</option>
                            @endif
                        </select>
                            
                    </div>
                    
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('num_documento', 'Numero de Documento')!!}
                    {!!Form::text('num_documento', null,['class'=>'form-control',' placeholder'=>'Numero de Documento'])!!}

                   </div>
                    
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="form-group">
                    {!!Form::label('telefono', 'Telefono')!!}
                    {!!Form::text('telefono', null,['class'=>'form-control',' placeholder'=>'Numero de telefono'])!!}

                   </div>
                    
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('email', 'Correo')!!}
                    {!!Form::text('email', null,['class'=>'form-control',' placeholder'=>'Introduzca Correo Electronico'])!!}

                   </div>
                    
                </div>
                
                
                <div   class="col-lg-12 col-md12 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <center>
                        <button type="submit" class="btn btn-info btn-sm">Actualizar usuario</button>
                        <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
                    </center>
                    </div>
                </div>
                
                
                        
            </div>
        

        
       {!!Form::close()!!}</center>
        
        
        
        
 
@endsection