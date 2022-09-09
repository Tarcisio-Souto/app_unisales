<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loans extends Model
{
    use HasFactory;

    public static function listAllLoans(){

        $loans = DB::table('loans as lo')
        ->join('assets as ass', 'ass.id', '=', 'lo.fk_asset')
        ->join('users as us', 'us.id', '=', 'lo.fk_user')
        ->select('ass.patrimony_number as pat_number', 'lo.status as lo_status',
                'us.name as us_name', 'lo.dt_loan', 'lo.dt_devolution')
        ->get();

        return $loans;

    }


}
