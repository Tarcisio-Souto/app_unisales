<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class States extends Model
{
    use HasFactory;

    public static function getStates() {

        $states = DB::table('states')
        ->select('name', 'id as id_state')
        ->get();

        return $states;

    }



}
