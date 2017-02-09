@extends('layouts.admin')



@section('content')

<div class="row">
    <div   class="col-lg-8 col-md-8 col-sm-8 col-xs-12"
           <h3>Listado de categorias <a href="categoria.create" class="btn btn-primary">Nuevo</a></h3>
          @include('almacen.categoria.search')
</div>

    <div class="row">
    <div   class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
           <div class="table-responsive">
             <table class="table table-hover">
                <thead>
                  
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>OPERACIONES</th>
                   
                </thead>
                
                @foreach($categorias as $categoria)     
                  <tr class="success">
                      <td>{{$categoria->idcategoria}}</td>
                      <td>{{$categoria->nombre}}</td>
                      <td>{{$categoria->descripcion}}</td>
                     
                          <td > 
                          <a href="" class="btn btn-danger glyphicon glyphicon-refresh"></a> 
                          <a href="" onclick="return confirm('Seguro desea eliminar')"class="btn btn-warning glyphicon glyphicon-trash"></a>
                         </td>
                          
                     
                   </tr>

               
               @endforeach
              </table>
               
          </div>
          
          
  </div>
        <div class="text-center">
           {!! $categorias->setPath('')->render()!!} 
        </div>
 
@endsection