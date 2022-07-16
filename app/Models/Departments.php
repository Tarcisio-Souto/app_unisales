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

    public static function listAllDepartments() {

        $departments = DB::table('departments as dept')
        ->join('instituitions as inst', 'inst.id', '=', 'dept.fk_instituition')
        ->select('dept.id', 'dept.name', 'dept.fk_instituition', 'inst.social_name')
        ->get();

        return $departments;

    }


}
