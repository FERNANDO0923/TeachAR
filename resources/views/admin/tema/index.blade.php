@extends ('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Temas <a href="tema/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('admin.tema.search')
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
                @foreach($temas as $tema)
                <tr>
                    <td>{{ $tema->idtema }}</td>
                    <td>{{ $tema->nombre }}</td>
                    <td>
                        <a href="{{URL::action('TemaController@edit',$tema->idtema)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$tema->idtema}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                    @include('admin.tema.modal')
                @endforeach

            </table>
        </div>
        {{$temas->render()}}

    </div>

</div>


@endsection