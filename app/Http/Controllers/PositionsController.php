<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PositionsController extends Controller
{

    public function index() {

        return Inertia::render('Positions/ListAllPositions.vue');

    }

    public function listAllPositions() {

        $cargos = Positions::listAllPositions();
        return response()->json($cargos);

    }

    public function store(Request $req) {
        
        $search_cargo = Positions::where('name', '=', $req->name)->first();
        $msg = '';

        if ($req->name != '' && isset($search_cargo['name'])) {
            $msg = 'Este cargo já existe.';
        }

        if ($req->name == '') {
            $msg = 'Informe o nome do cargo.';
        }       

        if ($msg != '') {
            $arr_err = Array(
                'name' => $msg,  
            );
        } 
        
        if (isset($arr_err)) {

            return response()->json(['errors' => $arr_err]);

        } else {
            
            $cargo = new Positions();
            $cargo->name = $req->name;
            $cargo->save();

            $msg = 'Cargo cadastrado com sucesso!';
            return response()->json(['success' => $msg]);

        }       

    }

    public function show($id) {

        $cargo = Positions::show($id);
        return Inertia::render('Positions/ViewPosition.vue', ['cargo' => $cargo]);

    }

    public function edit($id) {

        $cargo = Positions::show($id);
        return Inertia::render('Positions/EditPosition.vue', ['cargo' => $cargo]);

    }

    public function update(Request $req) {

        $cargo = Positions::find($req->id);  
        $msg = '';

        if ($req->name == $cargo->name) {
            $msg = 'Este cargo já existe.';
        }

        if ($req->name == '') {
            $msg = 'Informe o nome do cargo.';            
        }       

        if ($msg != '') {
            $arr_err = Array(
                'name' => $msg,  
            );
        } 
        
        if (isset($arr_err)) {

            return Redirect::route('cargo.editar', [$cargo->id])->withErrors($arr_err);

        } else {
            
            $cargo->name = $req->name;
            $cargo->update();

            $cargos = Positions::getPositions();
            return Redirect::route('cargos.lista', ['cargos' => $cargos]); 

        }       

    }

    public function destroy($id) {

        $cargo = Positions::where('id', '=', $id)->get();
        Positions::destroy($cargo);
        $msg = 'Cargo deletado com sucesso!';
        return response()->json(['success' => $msg]);

    }

}
