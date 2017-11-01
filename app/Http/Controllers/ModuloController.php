<?php

namespace TeachAR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use TeachAR\Http\Requests\ModuloFormRequest;
use TeachAR\Modulo;

class ModuloController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $modulos=DB::table('modulo')->where('nombre','LIKE','%'.$query.'%')
                ->where('estado','=','Activo')
                ->orderBy('idmodulo','desc')
                ->paginate(5);
            return view("admin.modulo.index",["modulos"=>$modulos,"searchText"=>$query]);
        }

    }
    public function create()
    {
        return View("admin.modulo.create");

    }
    public function store(ModuloFormRequest $request)
    {
        $modulo=new Modulo();
        $modulo->nombre=$request->get('nombre');
        $modulo->descripcion=$request->get('descripcion');
        $modulo->estado='Activo';
        $modulo->save();
        return Redirect::to('admin/modulo');

    }
    public function show($id)
    {
        return view("admin.modulo.show",["modulo"=>Modulo::findOrFail($id)]);

    }
    public function edit($id)
    {
        return view("admin.modulo.edit",["modulo"=>Modulo::findOrFail($id)]);

    }

    public function update(ModuloFormRequest $request,$id)
    {
        $modulo=Modulo::findOrFail($id);
        $modulo->nombre=$request->get('nombre');
        $modulo->descripcion=$request->get('descripcion');
        $modulo->update();
        return Redirect::to('admin/modulo');

    }
    public function destroy($id)
    {
        $modulo=Modulo::findOrFail($id);
        $modulo->estado='Inactivo';
        $modulo->update();
        return Redirect::to('admin/modulo');

    }
}
