<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Instituitions extends Model
{
    use HasFactory;

    public static function getInstituitions() {

        $instituitions = DB::table('instituitions')
        ->select('id','social_name')
        ->get();

        return $instituitions;

    }


}
