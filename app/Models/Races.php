<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Races extends Model
{
    use HasFactory;

    public static function getRaces() {

        $races = DB::table('races')
        ->select('id', 'name')
        ->get();

        return $races;

    }


}
