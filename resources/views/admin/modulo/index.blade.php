@extends ('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Modulos <a href="modulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('admin.modulo.search')
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </thead>
                @foreach($modulos as $modulo)
                <tr>
                    <td>{{ $modulo->idmodulo }}</td>
                    <td>{{ $modulo->nombre }}</td>
                    <td>
                        <a href="{{URL::action('ModuloController@edit',$modulo->idmodulo)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$modulo->idmodulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                    @include('admin.modulo.modal')
                @endforeach

            </table>
        </div>
        {{$modulos->render()}}

    </div>

</div>


@endsection