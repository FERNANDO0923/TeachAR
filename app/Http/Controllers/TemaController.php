<?php

namespace TeachAR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use TeachAR\Http\Requests\TemaFormRequest;
use TeachAR\Tema;

class TemaController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $temas=DB::table('tema as a')
                ->join('modulo as c','a.idmodulo','=','c.idmodulo')
                ->select('a.idtema','a.nombre','c.nombre as modulo','a.descripcion','a.imagen','a.estado')
                ->where('a.nombre','LIKE','%'.$query.'%')
                ->orderBy('idtema','desc')
                ->paginate(5);
            return view("admin.tema.index",["temas"=>$temas,"searchText"=>$query]);
        }

    }
    public function create()
    {
        $modulos=DB::table('modulo')->where('estado','=','Activo')->get();
        return view("admin.tema.create",["modulos"=>$modulos]);

    }
    public function store(TemaFormRequest $request)
    {
        $tema=new Tema();
        $tema->idmodulo=$request->get('idmodulo');
        $tema->nombre=$request->get('nombre');
        $tema->descripcion=$request->get('descripcion');
        $tema->estado="Activo";

        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/temas/',$file->getClientOriginalName());
            $tema->imagen=$file->getClientOriginalName();
        }


        $tema->save();
        return Redirect::to('admin/tema');

    }
    public function show($id)
    {
        return view("almacen.tema.show",["tema"=>tema::findOrFail($id)]);

    }
    public function edit($id)
    {
        $tema=Tema::FindOrFail($id);
        $modulos=DB::table('modulo')->where('estado','=','Activo')->get();
        return view("admin.tema.edit",["tema"=>$tema,"modulos"=>$modulos]);

    }

    public function update(TemaFormRequest $request,$id)
    {
        $tema=tema::findOrFail($id);
        $tema->idmodulo=$request->get('idmodulo');
        $tema->nombre=$request->get('nombre');
        $tema->descripcion=$request->get('descripcion');

        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/temas/',$file->getClientOriginalName());
            $tema->imagen=$file->getClientOriginalName();
        }
        $tema->update();
        return Redirect::to('admin/tema');

    }
    public function destroy($id)
    {
        $tema=tema::findOrFail($id);
        $tema->estado='Inactivo';
        $tema->update();
        return Redirect::to('admin/tema');

    }
}
