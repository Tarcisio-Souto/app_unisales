<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Departments;
use App\Models\Instituitions;
use App\Models\Positions;
use App\Models\Races;
use App\Models\Sectors;
use App\Models\States;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UsersController extends Controller
{
    
    public function index() {

        $users = User::listAllUsers();
        return Inertia::render('Users/ListAllUsers.vue', ['users' => $users]);

    }

    public function create() {
        
        $positions = Positions::getPositions();
        $instituitions = Instituitions::getInstituitions();
        $races = Races::getRaces();
        $departments = Departments::getDeparments();

        return Inertia::render('Users/AddUser.vue', 
        ['positions' => $positions, 'instituitions' => $instituitions,
        'races' => $races, 'departments' => $departments]);

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
            $address->fk_state = $req->state;
            $address->complement = $req->complement;
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
            $user->fk_instituition = $req->instituition;
            $user->fk_position = $req->position;
            $user->fk_race = $req->race;
            $user->registration = $req->registration;
            $user->phone_number = $req->phone_number;
            $user->fk_department = $req->department;
            $user->fk_race = $req->race;

            $user->password = Hash::make($req->password);          

            $date = explode("/",$req->dt_adm);
            $day = $date[0];
            $mouth = $date[1];
            $year = $date[2];            
            $data_format = $year.'-'.$mouth.'-'.$day;

            $data_old = date($data_format);
            $user->dt_adm = $data_old;


            $date = explode("/",$req->dt_birth);
            $day = $date[0];
            $mouth = $date[1];
            $year = $date[2];            
            $data_format = $year.'-'.$mouth.'-'.$day;

            $data_old = date($data_format);
            $user->dt_birth = $data_old;

            $user->status = 1;
            $user->fk_address = $fk_address;
            
            $user->save();

            return Redirect::route('usuario.cadastro')->with('success', 'Colaborador registrado com sucesso!'); 
        
        }

    }

    public function show($id) {

        $user = User::showUser($id);        
        return Inertia::render('Users/ViewUser.vue', ['user' => $user]);


    }

    public function edit($id) {

        $user = User::showUser($id);
        $positions = Positions::getPositions();
        $instituitions = Instituitions::getInstituitions();
        $races = Races::getRaces();
        $departments = Departments::getDeparments();

        return Inertia::render('Users/EditUser.vue', 
        ['positions' => $positions, 'instituitions' => $instituitions,
        'races' => $races, 'departments' => $departments, 'user' => $user]);


    }


    public function update(Request $req) {

        $user = User::find($req->id);

        //dd($user);

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

            return Redirect::route('usuario.editar', [$user->id])->withErrors($arr_err);

        } else {


            $address = Addresses::find($user->fk_address);
            $state = States::where('name', '=', $req->state)->get();

            //dd($state);

            $address->district = $req->district;
            $address->zipcode = $req->zipcode;
            $address->city = $req->city;
            $address->street = $req->street;
            $address->number = $req->number;
            $address->fk_state = $state[0]->id;
            $address->complement = $req->complement;
            $address->save();

            # Obter o ID do último registro da tabela:
            $fk_address = $address->id;

            //$user->src_foto = $req->foto;

            $department = Departments::where('name', '=', $req->department)->get();
            $race = Races::where('name', '=', $req->race)->get();
            $instituition = Instituitions::where('fantasy_name', '=', $req->instituition)->get();
            $position = Positions::where('name', '=', $req->position)->get();

            $user->name = $req->name;
            $user->cpf = $req->cpf;
            $user->age = $req->age;
            $user->genre = $req->genre;           
            $user->email = $req->email;
            $user->fk_instituition = $instituition[0]->id;
            $user->fk_position = $position[0]->id;
            $user->registration = $req->registration;
            $user->phone_number = $req->phone_number;
            $user->fk_department = $department[0]->id;
            $user->fk_race = $race[0]->id;
       

            $date = explode("/",$req->dt_adm);
            $day = $date[0];
            $mouth = $date[1];
            $year = $date[2];            
            $data_format = $year.'-'.$mouth.'-'.$day;

            $data_old = date($data_format);
            $user->dt_adm = $data_old;


            $date = explode("/",$req->dt_birth);
            $day = $date[0];
            $mouth = $date[1];
            $year = $date[2];            
            $data_format = $year.'-'.$mouth.'-'.$day;

            $data_old = date($data_format);
            $user->dt_birth = $data_old;

            $user->status = 1;
            $user->fk_address = $fk_address;
            
            $user->save();

            $users = User::listAllUsers();
            return Redirect::route('usuarios.lista', ['users' => $users]); 
        
        }

    }

    public function destroy($id) {

        $user = User::where('id', '=', $id)->get();
        User::destroy($user);

        $users = User::listAllUsers();
        return Redirect::route('usuarios.lista', ['users' => $users]); 



    }



}