@extends('layouts.admin')



@section('content')
<div class="row">
    <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Crear Nuevo Ingreso</h3>
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



        <center>{!!Form::open(['route'=>'compras.ingreso.store','method'=>'POST'])!!}
            <div class="row">
                <div   class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
                            @foreach($personas as $persona)
                            <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                            @endforeach
                        </select>
                   </div>
                </div>
                
<!--                <div   class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('direccion', 'Direccion')!!}
                    {!!Form::text('direccion', null,['class'=>'form-control',' placeholder'=>' introduzca la Direccion'])!!}

                   </div>
                </div>-->
                
                <div   class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label >Comprobante</label>
                        <select name="tipo_comprobante" class="form-control">
                           
                            <option value="Boleta">Boleta</option>
                            <option value="Factura">Factura</option>
                            <option value="Ticket">Ticket</option>
                           
                        </select>
                            
                    </div>
                    
                </div>
                
                <div   class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('serie_comprobante', 'Serie comprobante')!!}
                    {!!Form::text('serie_comprobante', null,['class'=>'form-control',' placeholder'=>'Serie comprobante'])!!}

                   </div>
                    
                </div>

           <div   class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                    {!!Form::label('num_comprobante', 'Numero comprobante')!!}
                    {!!Form::text('num_comprobante', null,['class'=>'form-control',' placeholder'=>'Numero comprobante'])!!}

                   </div>
                    
                </div>
                
</div>
                
            <div class="row" >
                
                <div class="panel panel-primary">
                    <div class="panel-body">
                        
                        <div   class="col-lg-3 col-md3 col-sm-3 col-xs-12">
                            <div class="form-group">
                                <label for="proveedor">Articulos</label>
                                <select name="pidarticulo" id="pidarticulo" class="form-control selectpicker" data-live-search="true">
                                    @foreach($articulos as $articulo)
                                    <option value="{{$articulo->idarticulo}}">{{$articulo->articulo}}</option>
                                    @endforeach
                                </select>
                          </div>
                            
                        </div>
                        
                        
                        <div   class="col-lg-3 col-md3 col-sm-3 col-xs-12">
                            <div class="form-group">
                                <label for="proveedor">Cantidad</label>
                                <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad"
                          </div>
                            
                        </div>
                        
                       </div>
                    
                    <div   class="col-lg-3 col-md3 col-sm-3 col-xs-12">
                            <div class="form-group">
                                <label for="proveedor">Precio de compra</label>
                                <input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="Precio de compra"
                          </div>
                            
                        </div>
                        
                    </div>
                
                <div   class="col-lg-3 col-md3 col-sm-3 col-xs-12">
                            <div class="form-group">
                                <label for="proveedor">Precio de venta</label>
                                <input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="Precio de venta"
                          </div>
                            
                        </div>
                        
               </div>
            
            <div   class="col-lg-3 col-md3 col-sm-3 col-xs-12">
                            <div class="form-group">
                                <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                          </div>
                            
            </div>
            
            <div   class="col-lg-12 col-md12 col-sm-12 col-xs-12">
                <table id="detalles"class="table table-striped table-responsive table-borderless table-condensed table-hover">
                    <thead>
                    <th>Opciones</th>
                    <th>Aticulo</th>
                    <th>Cantidad</th>
                    <th>Precio de Compra</th>
                    <th>Precio de venta</th>
                    <th>Sub-total</th>
                        
                    </thead>
                    
                    <tfoot>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4 id="total">S/. 0.00</h4></th>
                    </tfoot>
                    
                    <tbody>
                        
                        
                    </tbody>
                    
                </table>
                
            </div>
                        
               </div>
                    
                </div>
                
                <div   class="col-lg-12 col-md12 col-sm-12 col-xs-12">
                    <div class="form-group">
                     <center>
                         <input name="_token" value="{{ csrf_token()}}"type="hidden"> </input>
                             
                        <button type="submit" class="btn btn-info btn-sm">Crear Proveedor</button>
                        <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
                    </center>
                    </div>
                </div>
                
                
                        
            </div>
        

       {!!Form::close()!!}
        
       
@endsection