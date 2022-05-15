<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sectors extends Model
{
    use HasFactory;

    public static function getSectors($fk_department) {

        $sectors = DB::table('sectors')
        ->select('id', 'fk_department', 'name')
        ->where('fk_department', '=', $fk_department)
        ->get();

        return $sectors;

    }


}
