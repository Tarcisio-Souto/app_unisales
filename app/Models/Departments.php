<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Departments extends Model
{
    use HasFactory;

    public static function getDeparments() {

        $departments = DB::table('departments')
        ->select('id', 'name')
        ->get();

        return $departments;

    }


}
