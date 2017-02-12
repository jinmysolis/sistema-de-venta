@extends('layouts.admin')



@section('content')

<div class="row">
    <div   class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p>
        <h3 class="text-center">Listado de Proveedore</h3>
        </p>
            <a href="{{route('compras.proveedor.create')}}" class="btn btn-primary">Crear Nuevo Proveedor</a>
             @include('ventas.cliente.search')
</div>
 
    <div class="row">
    <div   class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
           <div class="table-responsive">
             <table class="table table-hover">
                <thead>
                  
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>TIPO DOC</th>
                    <th>NUMERO DOC</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th>EMAIL</th>
                    <th>OPERACIONES</th>
                   
                </thead>
                
                @foreach($personas as $per)     
                  <tr class="success">
                      <td>{{$per->idpersona}}</td>
                      <td>{{$per->nombre}}</td>
                      <td>{{$per->tipo_documento}}</td>
                      <td>{{$per->num_documento}}</td>
                      <td>{{$per->telefono}}</td>
                      <td>{{$per->direccion}}</td>
                      <td>{{$per->email}}</td>
                      
                    
                          <td > 
                          <a href="{{route('compras.proveedor.edit',$per->idpersona)}}" class="btn btn-danger glyphicon glyphicon-alert"></a> 
                          <a href=""data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal" class="btn btn-warning glyphicon glyphicon-trash"></a>
                         </td>
                          
                     
                   </tr>

               @include('compras.proveedor.modal')
               @endforeach
              </table>
               
          </div>
          
          
  </div>
        <div class="text-center">
           {!! $personas->setPath('')->render()!!} 
        </div>
 
@endsection