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
        ->select('id','social_name', 'cnpj', 'phone_number', 'email')
        ->get();

        return $instituitions;

    }

    public static function showInstituition() {

        $instituition = DB::table('instituitions as inst')
        ->join('addresses as addr', 'inst.fk_address', '=', 'addr.id')
        ->join('states as st', 'st.id', '=', 'addr.fk_state')
        ->select('inst.id as inst_id','social_name', 'cnpj', 'phone_number', 'email', 'fk_address',
                'addr.street', 'addr.number', 'addr.district', 'addr.complement', 
                'addr.city', 'addr.zipcode', 'st.name as state')
        ->get();

        return $instituition;

    }

    


}
