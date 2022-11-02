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
        ->select('ass.patrimony_number as pat_number', 'lo.status as lo_status', 'ass.name as asset_name',
                'us.name as us_name', 
                DB::raw('DATE_FORMAT(lo.dt_loan, "%d/%m/%Y %H:%i:%s") as dt_loan'),
                DB::raw('DATE_FORMAT(lo.dt_devolution, "%d/%m/%Y %H:%i:%s") as dt_devolution'),
                'lo.id as lo_id')
        ->get();

        return $loans;

    }


    public static function listAllOccurrences() {

        $loans = DB::table('loans as lo')
        ->join('assets as ass', 'ass.id', '=', 'lo.fk_asset')
        ->join('users as us', 'us.id', '=', 'lo.fk_user')
        ->select('ass.patrimony_number as pat_number', 'lo.status as lo_status', 'ass.name as asset_name',
                'us.name as us_name', 
                DB::raw('DATE_FORMAT(lo.dt_loan, "%d/%m/%Y %H:%i:%s") as dt_loan'),
                DB::raw('DATE_FORMAT(lo.dt_devolution, "%d/%m/%Y %H:%i:%s") as dt_devolution'),
                'lo.id as lo_id')
        ->where('lo.dt_devolution', '<', date("Y-m-d H:i:s"))
        ->get();

        return $loans;

    }


    public static function checkLoanActive($id_asset) {

        $loan = DB::table('loans as lo')
        ->join('assets as ass', 'ass.id', '=', 'lo.fk_asset')
        ->select('lo.status', DB::raw('MAX(lo.id)'))
        ->where('ass.id', '=', $id_asset)
        ->groupBy('lo.id', 'lo.status')
        ->get();

        return $loan;

    }

    public static function listLoansUser($id) {

        /*$loans = DB::table('loans as lo')
        ->join('assets as ass', 'ass.id', '=', 'lo.fk_asset')
        ->join('users as us', 'us.id', '=', 'lo.fk_user')
        ->select('ass.patrimony_number as pat_number', 'lo.status as lo_status', 'ass.name as asset_name',
                'us.name as us_name', 
                DB::raw('DATE_FORMAT(lo.dt_loan, "%d/%m/%Y %H:%i:%s") as dt_loan'),
                DB::raw('DATE_FORMAT(lo.dt_devolution, "%d/%m/%Y %H:%i:%s") as dt_devolution'),
                'lo.id as lo_id')
        ->where('us.id', '=', $id)
        ->get();*/


        $loans = DB::table('loans as lo')
        ->join('assets as ass', 'ass.id', '=', 'lo.fk_asset')
        ->join('users as us', 'us.id', '=', 'lo.fk_user')
        ->select('ass.patrimony_number as pat_number', 'ass.name as asset_name',
                'us.name as us_name',
                DB::raw('CASE WHEN (lo.status = 0) THEN "Locado"
                WHEN (lo.status = 1) THEN "Reservado"
                WHEN (lo.status = 2) THEN "Devolvido"
                END lo_status'),
                DB::raw('DATE_FORMAT(lo.dt_loan, "%d/%m/%Y %H:%i:%s") as dt_loan'),
                DB::raw('DATE_FORMAT(lo.dt_devolution, "%d/%m/%Y %H:%i:%s") as dt_devolution'),
                'lo.id as lo_id')
        ->where('us.id', '=', $id)
        ->get();


        return $loans;

    }



}
