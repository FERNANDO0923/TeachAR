@extends ('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Tema: {{ $tema->nombre }} </h3>
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

            {!! Form::model($tema,['method'=>'PATCH','route'=>['tema.update',$tema->idtema]])!!}
            {{Form::token()}}
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required value="{{$tema->nombre}}" placeholder="Nombre...">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                    <div class="form-group">
                        <label for="nombre">Módulo</label>
                        <select name="idmodulo" id="" class="form-control">
                            @foreach($modulos as $modulo)
                                @if($modulo->idmodulo==$tema->idmodulo)
                                    <option value="{{$modulo->idmodulo}}" selected>{{$modulo->nombre}}</option>
                                @else
                                    <option value="{{$modulo->idmodulo}}">{{$modulo->nombre}}</option>

                                @endif

                            @endforeach
                        </select>
                    </div>

                </div>
                <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" rows="10" cols="40" type="text"  value="{{$tema->descripcion}}" class="form-control" placeholder="Descripcion..."></textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                        @if(($tema->imagen) !="")
                            <img src="{{asset('imagenes/temas/'.$tema->imagen)}}" alt="">
                        @endif
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