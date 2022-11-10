<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Assets;
use App\Models\Categories;
use App\Models\Instituitions;
use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AssetsController extends Controller
{

    public function selectAssets($fk_category) {

        $assets = Assets::getAssetsPerCategory($fk_category);  
        return response()->json($assets);

    }


    public function index() {
      
        return Inertia::render('_Assets/ListAllAssets.vue');

    }

    public function show($id) {

        $assets = Assets::show($id);
        return Inertia::render('_Assets/ViewAsset.vue', ['assets' => $assets]);

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


    public function store(Request $req) {


        $msg1 = '';
        $msg2 = '';

        if (strlen($req->name) <= 0) {
            $msg1 = "Informe o modelo";
        }        

        if (strlen($req->patrimonio) <= 0) {
            $msg2 = "Informe o número de patrimônio";
        }

        if ($msg1 != '' || $msg2 != '') {

            $arr_err = Array(

                'name' => $msg1,
                'patrimonio' => $msg2      

            );

        }        

        if (isset($arr_err)) {

            return Redirect::route('patrimonio.cadastro')->withErrors($arr_err);

        } else {

            $assets = new Assets();
            $assets->name = $req->name;
            $assets->patrimony_number = $req->patrimonio;
            $assets->fk_instituition = $req->instituicao;
            $assets->fk_model = $req->modelo;
            $assets->fk_category = $req->categoria;
            $assets->status = 1;          
            $assets->save();

            return Redirect::route('patrimonios.lista'); 
        
        }

    }

    public function edit($id) {

        $asset = Assets::show($id);
        return Inertia::render('_Assets/EditAsset.vue', ['asset' => $asset]);

    }


    public function update(Request $req) {

        //dd($req->all());

        $msg1 = '';
        $msg2 = '';

        if (strlen($req->name) <= 0) {
            $msg1 = "Informe o modelo";
        }        

        if (strlen($req->patrimonio) <= 0) {
            $msg2 = "Informe o número de patrimônio";
        }

        if ($msg1 != '' || $msg2 != '') {

            $arr_err = Array(

                'name' => $msg1,
                'patrimonio' => $msg2      

            );

        }        

        if (isset($arr_err)) {

            return Redirect::route('patrimonio.cadastro')->withErrors($arr_err);

        } else {

            $asset = Assets::where('id', '=', $req->id)->first();
            $instituition = Instituitions::where('social_name', '=', $req->instituicao)->first();
            $model = Models::where('name', '=', $req->modelo)->first();
            $category = Categories::where('name', '=', $req->categoria)->first();

            $asset->name = $req->name;
            $asset->patrimony_number = $req->patrimonio;            
            $asset->fk_instituition = $instituition['id'];
            $asset->fk_model = $model['id'];
            $asset->fk_category = $category['id'];
            $asset->status = $req->status;          
            $asset->update();

            return Redirect::route('patrimonios.lista'); 
        
        }

    }

    public function destroy($id) {

        $asset = Assets::where('id', '=', $id)->get();
        Assets::destroy($asset);
        $msg = 'Patrimônio deletado com sucesso!';
        return response()->json(['success' => $msg]); 

    }



}
