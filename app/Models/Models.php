<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Models extends Model
{
    use HasFactory;

    public static function listAllModels() {

        $models = DB::table('models as mod')
        ->select('mod.id as mod_id', 'mod.name as mod_name')
        ->get();

        return $models;

    }


}
