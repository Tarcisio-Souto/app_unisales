<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AssetsController extends Controller
{

    public function index() {
      
        return Inertia::render('_Assets/ListAllAssets.vue');

    }

    public function listAllAssets() {

        $assets = Assets::listAllAssets();
        return response()->json($assets);

    }




}
