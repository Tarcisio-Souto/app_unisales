<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PositionsController extends Controller
{

    public function index() {

        $cargos = Positions::getPositions();
        return Inertia::render('Positions/ListAllPositions.vue', ['cargos' => $cargos]);

    }

    


}
