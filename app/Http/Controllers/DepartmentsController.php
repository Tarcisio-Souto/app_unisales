<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Instituitions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DepartmentsController extends Controller
{
    public function index() {
        
        return Inertia::render('Departments/ListAllDepartments.vue');

    }

    public function listAllDepartments() {

        $departments = Departments::listAllDepartments();
        return response()->json($departments);

    }

    public function store(Request $req) {
        
        $cargo = auth()->user()->fk_position;

        $search_dept = Departments::where('name', '=', $req->name)->first();
        $msg = '';

        if ($req->name != '' && isset($search_dept['name'])) {
            $msg = 'Este departamento já existe.';
        }

        if ($req->name == '') {
            $msg = 'Informe o nome do departamento.';
        }       

        if ($msg != '') {
            $arr_err = Array(
                'name' => $msg,  
            );
        } 

        if ($cargo != 8) {
            $alert = 'O acesso requer elevação.';
        }

        if ($msg != '' && $alert == '') {
            $arr_err = Array(
                'name' => $msg
            );
        } 

        if ($msg == '' && $alert != '') {
            $arr_err = Array(
                'accessLevel' => $alert
            );
        } 

        if ($msg != '' && $alert != '') {
            $arr_err = Array(
                'name' => $msg,
                'accessLevel' => $alert
            );
        } 
        
        if (isset($arr_err)) {

            //return Redirect::route('departamento.cadastro')->withErrors($arr_err);
            return response()->json(['errors' => $arr_err]);

        } else {
            
            $department = new Departments();
            $department->name = $req->name;
            $department->fk_instituition = $req->instituicao;
            $department->save();

            $msg = 'Departamento cadastrado com sucesso!';
            return response()->json(['success' => $msg]);

        }       

    }


    public function show($id) {

        $department = Departments::showDepartment($id);
        return Inertia::render('Departments/ViewDepartment.vue', ['department' => $department]);

    }

    public function edit($id) {

        $department = Departments::showDepartment($id);
        $instituitions = Instituitions::listAllInstituitions();
        return Inertia::render('Departments/EditDepartment.vue', 
        ['department' => $department, 'instituitions' => $instituitions]);

    }


    public function update(Request $req) {

        $msg = '';
        $department = Departments::find($req->id);

        if ($req->name == '') {
            $msg = 'Informe o nome do departamento.';
        }

        if ($msg != '') {
            $arr_err = Array(
                'name' => $msg,  
            );
        } 
        
        if (isset($arr_err)) {

            return Redirect::route('departamento.editar', [$department->id])->withErrors($arr_err);

        } else {
            
            $instituition = Instituitions::where('social_name', '=', $req->instituition)->first();
            $department->name = $req->name;
            $department->fk_instituition = $instituition->id;
            $department->update();

            $departments = Departments::listAllDepartments();
            return Inertia::render('Departments/ListAllDepartments.vue', ['departments' => $departments]);

        }       

    }

    public function destroy($id) {

        $department = Departments::where('id', '=', $id)->get();
        Departments::destroy($department);
        $msg = 'Departamento deletado com sucesso!';
        return response()->json(['success' => $msg]); 

        //$departments = Departments::listAllDepartments();
        //return Redirect::route('departamento.lista', ['departments' => $departments]);

    }

}
