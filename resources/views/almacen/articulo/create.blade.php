@extends('layouts.admin')



@section('content')
<div class="row">
    <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Crear Nuevo Articulo</h3>
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

        <center>{!!Form::open(['route'=>'almacen.articulo.store','method'=>'POST','files'=>'true'])!!}
            <div class="row">
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('nombre', 'Nombre')!!}
                    {!!Form::text('nombre', null,['class'=>'form-control',' placeholder'=>'Por favor introduzca el articulo'])!!}

                   </div>
                    
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label >Categoria</label>
                        <select name="idcategoria" class="form-control">
                            @foreach($categorias as $cat)
                            <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                            @endforeach
                        </select>
                            
                    </div>
                    
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('codigo', 'Codigo')!!}
                    {!!Form::text('codigo', null,['class'=>'form-control',' placeholder'=>'Por favor  el codigo'])!!}

                   </div>
                    
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="form-group">
                    {!!Form::label('stock', 'Stock')!!}
                    {!!Form::text('stock', null,['class'=>'form-control',' placeholder'=>'Cantidad'])!!}

                   </div>
                    
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('descripcion', 'Descripcion')!!}
                    {!!Form::text('descripcion', null,['class'=>'form-control',' placeholder'=>'Descripcion del articulo'])!!}

                   </div>
                    
                </div>
                
                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('imagen', 'Imagen')!!}
                    {!!Form::file('imagen', null,['class'=>'form-control'])!!}

                   </div>
                    
                </div>
                
                <div   class="col-lg-12 col-md12 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <center>
                        <button type="submit" class="btn btn-info btn-sm">Crear Categoria</button>
                        <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
                    </center>
                    </div>
                </div>
                
                
                        
            </div>
        

       {!!Form::close()!!}
        
       
@endsection