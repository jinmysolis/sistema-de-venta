@extends('layouts.admin')



@section('content')

<div class="row">
    <div   class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p>
        <h3 class="text-center">Listado de articulos</h3>
        </p>
            <a href="{{route('almacen.articulo.create')}}" class="btn btn-primary">Crear Nuevo Articulo</a>
             @include('almacen.articulo.search')
</div>
 
    <div class="row">
    <div   class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
           <div class="table-responsive">
             <table class="table table-hover">
                <thead>
                  
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CODIGO</th>
                    <th>CATEGORIA</th>
                    <th>STOCK</th>
                    <th>IMAGEN</th>
                    <th>DESCRIPCION</th>
                    <th>ESTADO</th>
                    <th>OPERACIONES</th>
                   
                </thead>
                
                @foreach($articulos as $art)     
                  <tr class="success">
                      <td>{{$art->idarticulo}}</td>
                      <td>{{$art->nombre}}</td>
                      <td>{{$art->codigo}}</td>
                      <td>{{$art->categoria}}</td>
                      <td>{{$art->stock}}</td>
                      <td>
                          <img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{$art->nombre}}" height="100px" width="100px" class="img-responsive img-thumbnail">
                      </td>
                    <td>{{$art->descripcion}}</td>
                     <td>{{$art->estado}}</td>
                    
                          <td > 
                          <a href="{{route('almacen.articulo.edit',$art->idarticulo)}}" class="btn btn-danger glyphicon glyphicon-refresh"></a> 
                          <a href=""data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal" class="btn btn-warning glyphicon glyphicon-trash"></a>
                         </td>
                          
                     
                   </tr>

               @include('almacen.articulo.modal')
               @endforeach
              </table>
               
          </div>
          
          
  </div>
        <div class="text-center">
           {!! $articulos->setPath('')->render()!!} 
        </div>
 
@endsection