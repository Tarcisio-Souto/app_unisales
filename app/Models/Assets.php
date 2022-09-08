<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assets extends Model
{
    use HasFactory;

    public static function listAllAssets() {

        $assets = DB::table('assets as ass')
        ->join('categories as cat', 'cat.id', '=', 'ass.fk_category')
        ->join('instituitions as inst', 'inst.id', '=', 'ass.fk_instituition')
        ->join('models as mod', 'mod.id', '=', 'ass.fk_model')
        ->select('ass.id as ass_id', 'cat.id as cat_id', 'inst.id as inst_id',
                'mod.id as mod_id', 'ass.name as ass_name', 'cat.name as cat_name', 
                'inst.social_name as social_name', 'mod.name as mod_name', 'ass.status as ass_status')
        ->get();

        return $assets;

    }

    public static function show($id) {

        $asset = DB::table('assets as ass')
        ->join('categories as cat', 'cat.id', '=', 'ass.fk_category')
        ->join('instituitions as inst', 'inst.id', '=', 'ass.fk_instituition')
        ->join('models as mod', 'mod.id', '=', 'ass.fk_model')
        ->select('ass.id as ass_id', 'cat.id as cat_id', 'inst.id as inst_id',
                'mod.id as mod_id', 'ass.name as ass_name', 'ass.patrimony_number as ass_pat', 'cat.name as cat_name', 
                'inst.social_name as social_name', 'mod.name as mod_name', 'ass.status as ass_status')
        ->where('ass.id', '=', $id)
        ->get();

        return $asset;
    
    }

    public static function getAssetsPerCategory($fk_category) {

        $assets = DB::table('assets as ass')
        ->select('ass.id as ass_id', 'ass.name as ass_name')
        ->get();

        return $assets;

    }


}
