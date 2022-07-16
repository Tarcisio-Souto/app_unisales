<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DepartmentsController extends Controller
{
    public function index() {

        $departments = Departments::listAllDepartments();
        return Inertia::render('Departments/ListAllDepartments.vue', ['departments' => $departments]);

    }

    public function show($id) {

        $department = Departments::showDepartment($id);
        return Inertia::render('Departments/ViewDepartment.vue', ['department' => $department]);

    }



}
