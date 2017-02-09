@extends('layouts.admin')



@section('content')
<div class="row">
    <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Categoria: {{$categoria->nombre}}</h3>
        @if(count($errors) >0 )
        <div class="alert alert-danger">
            
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        {!!Form::model($categoria,['route'=>['almacen.categoria.update',$categoria->idcategoria],'method'=>'PUT'])!!}
        

        <div class="col-md-12">
        <div class="form-group">
          {!!Form::label('nombre', 'Nombre')!!}
          {!!Form::text('nombre', null,['class'=>'form-control'])!!}

        </div>

        <div class="col-md-12">
        <div class="form-group">
          {!!Form::label('descripcion', 'Descripcion')!!}
          {!!Form::textarea('descripcion', null,['class'=>'form-control',' placeholder'=>'Por favor introduzca la Descripcion'])!!}

        </div>


         <p>
        <center>
        <button type="submit" class="btn btn-info btn-sm">Editar Categoria</button>
        <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
        </center>
        </p>

       {!!Form::close()!!}</center>
        
        
        
        
    </div>
</div>
@endsection