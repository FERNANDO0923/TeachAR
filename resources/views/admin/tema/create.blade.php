@extends ('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Tema</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

            {!! Form::open(array('url'=>'admin/tema','method'=>'POST','autocomplete'=>'off')) !!}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="{{old('nombre')}}" placeholder="Nombre...">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
            <div class="form-group">
                <label for="nombre">Módulo</label>
                <select name="idmodulo" id="" class="form-control">
                    <option value="">select:</option>
                    @foreach($modulos as $modulo)
                        <option value="{{$modulo->idmodulo}}">{{$modulo->nombre}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" rows="10" cols="40" type="text"  class="form-control" placeholder="Descripcion..."></textarea>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>





    </div>


            {!! Form::close() !!}
@endsection