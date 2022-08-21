<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Positions extends Model
{
    use HasFactory;

    public static function listAllPositions() {

        $positions = DB::table('positions')
        ->select('id','name')
        ->get();

        return $positions;

    }

    public static function show($id) {

        $position = DB::table('positions')
        ->select('id', 'name')
        ->where('id', '=', $id)
        ->get();

        return $position;

    }


}
