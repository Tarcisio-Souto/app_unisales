<?php

namespace App\Http\Controllers;

use App\Models\Instituitions;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InstituitionsController extends Controller
{
    
    public function index() {

        $instituitions = Instituitions::getInstituitions();
        return Inertia::render('Instituitions/ListAllInstituitions.vue', ['instituitions' => $instituitions]);

    }

    public function show($id) {

        $instituition = Instituitions::showInstituition($id);     
        return Inertia::render('Instituitions/ViewInstituition.vue', ['instituition' => $instituition]);

    }

    





}
