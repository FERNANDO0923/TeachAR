@extends ('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Módulo: {{ $modulo->nombre }} </h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($modulo,['method'=>'PATCH','route'=>['modulo.update',$modulo->idmodulo]])!!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control"  value="{{$modulo->nombre}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$modulo->descripcion}}" placeholder="Descripcion...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection