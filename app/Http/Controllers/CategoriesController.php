<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use PhpParser\Node\Expr\Cast\Object_;
use SebastianBergmann\Environment\Console;
use SebastianBergmann\Type\ObjectType;

class CategoriesController extends Controller
{
    
    public function index() {
      
        $categorias = Categories::listAllCategories();
        return Inertia::render('Categories/ListAllCategories.vue', ['categorias' => $categorias]);

    }

    public function listAllCategories() {

        $categorias = Categories::listAllCategories();
        return response()->json($categorias);
        //return response()->json(['categorias' => $categorias]);

    }
    

    /*public function create() {

        return Inertia::render('Categories/AddCategory.vue');

    }*/

    public function store(Request $req) {

        $search_cartegoria = Categories::where('name', '=', $req->name)->first();
        $msg = '';

        if ($req->name != '' && isset($search_cartegoria['name'])) {
            $msg = 'Esta categoria já existe.';
        }

        if ($req->name == '') {
            $msg = 'Informe o nome da categoria.';
        }       

        if ($msg != '') {
            $arr_err = Array(
                'name' => $msg,  
            );
        } 
        
        if (isset($arr_err)) {

            return response()->json(['errors' => $arr_err]);

        } else {
            
            $categoria = new Categories();
            $categoria->name = $req->name;
            $categoria->save();

            $msg = 'Categoria cadastrada com sucesso!';
            return response()->json(['success' => $msg]);

        }       

    }

    public function show($id) {

        $categoria = Categories::show($id);
        return Inertia::render('Categories/ViewCategory.vue', ['categoria' => $categoria]);

    }

    public function edit($id) {

        $categoria = Categories::show($id);
        return Inertia::render('Categories/EditCategory.vue', ['categoria' => $categoria]);

    }

    public function update(Request $req) {

        $categoria = Categories::find($req->id);  
        $msg = '';

        if ($req->name == $categoria->name) {
            $msg = 'Esta categoria já existe.';
        }

        if ($req->name == '') {
            $msg = 'Informe o nome da categoria.';            
        }       

        if ($msg != '') {
            $arr_err = Array(
                'name' => $msg,  
            );
        } 
        
        if (isset($arr_err)) {

            return Redirect::route('categoria.editar', [$categoria->id])->withErrors($arr_err);

        } else {
            
            $categoria->name = $req->name;
            $categoria->update();

            $categorias = Categories::listAllCategories();
            return Redirect::route('categorias.lista', ['categorias' => $categorias]); 

        }       

    }

    public function destroy($id) {

        /* Verifica se existe categoria associada a algum produto para invalidar a exclusão via sistema */

        $dependencia_cat = Assets::where('fk_category', '=', $id)->count();
        
        if ($dependencia_cat <= 0) {
            $categoria = Categories::where('id', '=', $id)->get();
            Categories::destroy($categoria);
            $categorias = Categories::listAllCategories();
            return Redirect::route('categorias.lista', ['categorias' => $categorias]); 
        } else {
            //dd('com dependencia');
            return response()->json(['error' => 'A categoria contém dependências e não pode ser excluída. Contate o administrador do sistema.']);
            //return Redirect::route('categorias.lista')->withErrors(['errors' => 'A categoria contém dependências e não pode ser excluída. Contate o administrador do sistema.', 403]);

        }            

        

    }


}
