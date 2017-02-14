@extends('layouts.admin')



@section('content')

<div class="row">
    <div   class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p>
        <h3 class="text-center">Listado de Ingreso</h3>
        </p>
            <a href="{{route('compras.ingreso.create')}}" class="btn btn-primary">Crear Nuevo Ingreso</a>
             @include('compras.ingreso.search')
</div>
 
    <div class="row">
    <div   class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
           <div class="table-responsive">
             <table class="table table-hover">
                <thead>
                  

                    <th>FECHA</th>
                    <th>PROVEEDOR</th>
                    <th>TIPO COMPROBANTE</th>
                    <th>SERIE COMPROBANTE</th>
                    <th>NUMERO COMPROBANTE</th>
                    <th>IMPUESTO</th>
                    <th>TOTAL</th>
                    <th>ESTADO</th>
                    <th>OPERACIONES</th>
                   
                </thead>
                
                @foreach($ingresos as $ing)     
                  <tr class="success">
                      <td>{{$ing->fecha_hora}}</td>
                      <td>{{$ing->nombre}}</td>
                      <td>{{$ing->tipo_comprobante}}</td>
                      <td>{{$ing->serie_comprobante}}</td>
                      <td>{{$ing->num_comprobante}}</td>
                      <td>{{$ing->impuesto}}</td>
                      <td>{{$ing->total}}</td>
                      <td>{{$ing->estado}}</td>
                      
                    
                          <td > 
                          <a href="{{URL::action('IngresoController@show',$ing->idingreso)}}" class="btn btn-danger glyphicon glyphicon-alert">detalles</a> 
                          <a href=""data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal" class="btn btn-warning glyphicon glyphicon-trash">anular</a>
                         </td>
                          
                     
                   </tr>

               @include('compras.ingreso.modal')
               @endforeach
              </table>
               
          </div>
          
          
  </div>
        <div class="text-center">
           {!! $ingresos->setPath('')->render()!!} 
        </div>
 
@endsection