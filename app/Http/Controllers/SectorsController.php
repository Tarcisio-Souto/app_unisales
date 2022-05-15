<?php

namespace App\Http\Controllers;

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
}
