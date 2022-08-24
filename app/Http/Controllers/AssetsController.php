<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Categories;
use App\Models\Instituitions;
use App\Models\Models;
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

    public function create() {

        $modelos = Models::listAllModels();
        $categorias = Categories::listAllCategories();
        $instituicoes = Instituitions::listAllInstituitions();

        return Inertia::render('_Assets/AddAsset.vue', ['modelos' => $modelos,
        'categorias' => $categorias, 'instituicoes' => $instituicoes]);

    }


}
