<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PositionsController extends Controller
{

    public function index() {

        $cargos = Positions::getPositions();
        return Inertia::render('Positions/ListAllPositions.vue', ['cargos' => $cargos]);

    }

    public function create() {

        return Inertia::render('Positions/AddPosition.vue');

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

            return Redirect::route('cargo.cadastro')->withErrors($arr_err);

        } else {
            
            $cargo = new Positions();
            $cargo->name = $req->name;
            $cargo->save();

            $cargos = Positions::getPositions();
            return Redirect::route('cargo.lista', ['cargos' => $cargos]); 

        }       

    }

    public function show($id) {

        $cargo = Positions::show($id);
        return Inertia::render('Positions/ViewPosition.vue', ['cargo' => $cargo]);

    }



}
