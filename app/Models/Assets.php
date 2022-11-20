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

        /**select * from assets ass 
        left join loans lo 
        on lo.fk_asset = ass.id 
        where lo.status = 2 
        and ass.fk_category = 1 
        or ass.id not in (select fk_asset from loans) 
        and ass.fk_category = 1;**/

        /*$assets = DB::table('assets as ass')
        ->leftJoin('loans as lo', 'lo.fk_asset', '=', 'ass.id')
        ->select('ass.id as ass_id', 'ass.name as ass_name')       
        ->where('lo.status', '=', 2)
        ->where('ass.fk_category', '=', $fk_category)
        ->orWhereNotIn('ass.id', ['select fk_asset from loans'])
        ->where('ass.fk_category', '=', $fk_category)
        ->distinct()
        ->get();
        */

        $assets = DB::select(DB::raw("select ass.id as ass_id, ass.name as ass_name from assets ass
        where ass.fk_category = '$fk_category'
        and ass.id not in (select lo.fk_asset from loans lo
                      where lo.status = 0 or lo.status = 1)"));

        return $assets;

    }

    public static function searchAsset($id) {

        $asset = DB::table('assets')
        ->select('*')
        ->where('id', '=', $id)
        ->get();

        return $asset;

    }


}
