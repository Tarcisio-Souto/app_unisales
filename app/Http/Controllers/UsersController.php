<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Instituitions;
use App\Models\Positions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UsersController extends Controller
{
    
    public function index() {

        

    }

    public function create() {
        
        $positions = Positions::getPositions();
        $instituitions = Instituitions::getInstituitions();

        return Inertia::render('Users/AddUser.vue', 
        ['positions' => $positions, 'instituitions' => $instituitions]);

    }

    public function store(Request $req) {

        //dd($req->all());

        $msg1 = '';
        $msg2 = '';
        $msg3 = '';
        $msg4 = '';

        if (strlen($req->name) <= 5) {
            $msg1 = "Informe um nome válido";    
        }        

        if (strlen($req->cpf) < 11) {
            $msg2 = "Informe um CPF válido";
        }

        if (intval($req->age) < 0) {
            $msg3 = "Informe uma idade válida";
        }

        if ($req->password != $req->confirm_password) {
            $msg4 = "As senhas não são iguais";
        }

        if ($msg1 != '' || $msg2 != '' || $msg3 != '' || $msg4 != '') {

            $arr_err = Array(

                'nome' => $msg1,
                'cpf' => $msg2,
                'idade' => $msg3,
                'senha' => $msg4                
    
            );

        }        

        if (isset($arr_err)) {

            return Redirect::route('usuario.cadastro')->withErrors($arr_err);

        } else {


            $address = new Addresses();
            $address->district = $req->district;
            $address->zipcode = $req->zipcode;
            $address->city = $req->city;
            $address->street = $req->street;
            $address->number = $req->number;
            $address->state = $req->state;
            $address->save();

            # Obter o ID do último registro da tabela:
            $fk_address = DB::getPdo()->lastInsertId();

            $user = new User();

            //$user->src_foto = $req->foto;
            $user->name = $req->name;
            $user->cpf = $req->cpf;
            $user->age = $req->age;
            $user->genre = $req->genre;           
            $user->email = $req->email;
            $user->instituition = $req->instituition;
            $user->fk_position = $req->position;
            $user->fk_race = $req->race;
            $user->register = $req->register;
            $user->phone_number = $req->phone_number;

            $user->password = Hash::make($req->password);          

            $date = explode("/",$req->dt_adm);
            $day = $date[0];
            $mouth = $date[1];
            $year = $date[2];            
            $data_format = $year.'-'.$mouth.'-'.$day;

            $data_old = date($data_format);
            $user->dt_adm = $data_old;

            $user->fk_address = $fk_address;
            
            $user->save();

            return Redirect::route('usuario.cadastro')->with('success', 'Colaborador registrado com sucesso!'); 
        
        }

    }


}