<div class="modal fade modal-slide-in-bottom" aria-hidden="true" role="dialog" tabindex="-1"
     id="modal-delete-{{$modulo->idmodulo}}">
    {{Form::Open(array('action'=>array('ModuloController@destroy',$modulo->idmodulo),'method'=>'delete'))}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">Eliminar Módulo</h4>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea Eliminar el Módulo</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    {{Form::Close()}}
</div>