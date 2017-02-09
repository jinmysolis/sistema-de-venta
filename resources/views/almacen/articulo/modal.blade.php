<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" 
     id="modal-delete-{{$art->idarticulo}}">
    {{Form::Open(array('action'=>array('ArticuloController@destroy',$art->idarticulo),'method'=>'delete'))}}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
            <h4 class="modal-title">Eliminar Articulo</h4>
        </div>
        <div class="modal-body">
            <p>Confirme sidesea eliminar Articulo</p>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger" >Confirmar</button>
        </div>
        
        
    </div>
    {{Form::close()}}

</div>