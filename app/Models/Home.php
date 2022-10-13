<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    public static function topLoans() {

        /*select cat.id, cat.name, count(cat.id) as FREQUENCIA from categories cat 
        inner join assets ass
        on cat.id = ass.fk_category
        inner join loans lo
        on lo.fk_asset = ass.id
        group by 1*/

        $topLoans = DB::table('categories as cat')
        ->join('assets as ass', 'cat.id', '=', 'ass.fk_category')
        ->join('loans as lo', 'lo.fk_asset', '=', 'ass.id')
        ->select('cat.id as cat_id', DB::raw('count(cat.id) as qtd'), 'cat.name as cat_name')
        ->groupBy('cat_id', 'cat_name')
        ->get();

        return $topLoans;

    }


}
