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

    public static function listAllSectors() {

        $sectors = DB::table('sectors as sect')
        ->join('departments as dept', 'dept.id', '=', 'sect.fk_department')
        ->select('sect.id as sect_id', 'fk_department', 'sect.name as sect_name', 'dept.name as dept_name')
        ->get();

        return $sectors;

    }

    public static function show($id) {

        $sector = DB::table('sectors as sect')
        ->join('departments as dept', 'dept.id', '=', 'sect.fk_department')
        ->select('sect.id as sect_id', 'fk_department', 'sect.name as sect_name', 'dept.name as dept_name')
        ->where('sect.id', '=', $id)
        ->get();

        return $sector;

    }


}
