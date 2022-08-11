<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    use HasFactory;

    public static function listAllCategories() {

        $categorias = DB::table('categories')        
        ->select('id', 'name')
        ->get();

        return $categorias;

    }

    public static function show($id) {

        $categoria = DB::table('categories')
        ->select('id', 'name')
        ->where('id', '=', $id)
        ->get();

        return $categoria;

    }


}
