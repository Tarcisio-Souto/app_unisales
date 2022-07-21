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

        $departments = Departments::listAllDepartments();
        return Inertia::render('Departments/ListAllDepartments.vue', ['departments' => $departments]);

    }

    public function create() {

        $instituitions = Instituitions::getInstituitions();
        return Inertia::render('Departments/AddDepartment.vue', ['instituitions' => $instituitions]);

    }

    public function store(Request $req) {
        
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
        
        if (isset($arr_err)) {

            return Redirect::route('departamento.cadastro')->withErrors($arr_err);

        } else {
            
            $department = new Departments();
            $department->name = $req->name;
            $department->fk_instituition = $req->instituition;
            $department->save();

            $departments = Departments::listAllDepartments();
            return Redirect::route('departamento.lista', ['departments' => $departments]); 

        }       

    }


    public function show($id) {

        $department = Departments::showDepartment($id);
        return Inertia::render('Departments/ViewDepartment.vue', ['department' => $department]);

    }

    public function edit($id) {

        $department = Departments::showDepartment($id);
        $instituitions = Instituitions::getInstituitions();
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

}
