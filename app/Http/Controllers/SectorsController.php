<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Sectors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SectorsController extends Controller
{
    public function show($fk_department) {

        $sectors = Sectors::getSectors($fk_department);
        //return Redirect::route('usuario.cadastro', ['sectors' => $sectors]); 
        //return Inertia::render('Users/AddUser.vue', ['sectors' => $sectors]);        
        return response()->json($sectors);

    }


    public function index() {

        $sectors = Sectors::listAllSectors();
        return Inertia::render('Sectors/ListAllSectors.vue', ['sectors' => $sectors]);

    }

    public function create() {

        $departments = Departments::getDeparments();
        return Inertia::render('Sectors/AddSector.vue', ['departments' => $departments]);

    }

    public function store(Request $req) {
        
        $search_dept = Sectors::where('name', '=', $req->name)->first();
        $msg = '';

        if ($req->name != '' && isset($search_dept['name'])) {
            $msg = 'Este setor já existe.';
        }

        if ($req->name == '') {
            $msg = 'Informe o nome do setor.';
        }       

        if ($msg != '') {
            $arr_err = Array(
                'name' => $msg,  
            );
        } 
        
        if (isset($arr_err)) {

            return Redirect::route('setor.cadastro')->withErrors($arr_err);

        } else {
            
            $sector = new Sectors();
            $sector->name = $req->name;
            $sector->fk_department = $req->department;
            $sector->save();

            $sectors = Sectors::listAllSectors();
            return Redirect::route('setor.lista', ['sectors' => $sectors]); 

        }       

    }


    public function view($id) {

        $sector = Sectors::show($id);
        return Inertia::render('Sectors/ViewSector.vue', ['sector' => $sector]);

    }

    public function edit($id) {

        $sector = Sectors::show($id);
        $departments = Departments::listAllDepartments();
        return Inertia::render('Sectors/EditSector.vue', 
        ['departments' => $departments, 'sector' => $sector]);

    }


    public function update(Request $req) {

        $sector = Sectors::find($req->id);  
        $msg = '';

        if ($req->name == $sector->name) {
            $msg = 'Este setor já existe.';
        }

        if ($req->name == '') {
            $msg = 'Informe o nome do setor.';            
        }       

        if ($msg != '') {
            $arr_err = Array(
                'name' => $msg,  
            );
        } 
        
        if (isset($arr_err)) {

            return Redirect::route('setor.editar', [$sector->id])->withErrors($arr_err);

        } else {
            
            $department = Departments::where('name', '=', $req->department)->first();
            $sector->name = $req->name;
            $sector->fk_department = $department->id;
            $sector->update();

            $sectors = Sectors::listAllSectors();
            return Inertia::render('Sectors/ListAllSectors.vue', ['sectors' => $sectors]);

        }       

    }

    public function destroy($id) {

        $sector = Sectors::where('id', '=', $id)->get();
        Sectors::destroy($sector);

        $sectors = Sectors::listAllSectors();
        return Redirect::route('setor.lista', ['sectors' => $sectors]); 

    }


}
