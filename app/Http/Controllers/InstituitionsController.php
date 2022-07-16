<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Instituitions;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class InstituitionsController extends Controller
{
    
    public function index() {

        $instituitions = Instituitions::getInstituitions();
        return Inertia::render('Instituitions/ListAllInstituitions.vue', ['instituitions' => $instituitions]);

    }

    public function show($id) {

        $instituition = Instituitions::showInstituition($id);     
        return Inertia::render('Instituitions/ViewInstituition.vue', ['instituition' => $instituition]);

    }

    public function edit($id) {

        $instituition = Instituitions::showInstituition($id);
        $states = States::getStates();
        return Inertia::render('Instituitions/EditInstituition.vue', 
        ['instituition' => $instituition, 'states' => $states]);

    }

    public function create() {

        $states = States::getStates();
        return Inertia::render('Instituitions/AddInstituition.vue', ['states' => $states]);

    }

    public function store(Request $req) {

        //dd($req->all());

        $msg1 = '';
        $msg2 = '';
        $msg3 = '';
        $msg4 = '';

        if (strlen($req->social_name) <= 5) {
            $msg1 = "Informe um nome social válido";    
        }        

        if (strlen($req->cnpj) < 11) {
            $msg2 = "Informe um CNPJ válido";
        }

        if (intval($req->email) < 0) {
            $msg3 = "Informe uma email válido";
        }

        if (strlen($req->fantasy_name) <= 5) {
            $msg4 = "Informe um nome fantasia válido";    
        }  

        if ($msg1 != '' || $msg2 != '' || $msg3 != '') {

            $arr_err = Array(

                'social_name' => $msg1,
                'cnpj' => $msg2,
                'email' => $msg3          

            );

        }        

        if (isset($arr_err)) {

            return Redirect::route('instituicao.cadastro')->withErrors($arr_err);

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
            $fk_address = $address->id;

            $instituition = new Instituitions();
            $instituition->social_name = $req->social_name;
            $instituition->fantasy_name = $req->fantasy_name;
            $instituition->cnpj = $req->cnpj;
            $instituition->email = $req->email;
            $instituition->phone_number = $req->phone_number;           
            $instituition->status = $req->status;       
            $instituition->fk_address = $fk_address;
            
            $instituition->save();

            $instituicoes = Instituitions::getInstituitions();
            return Redirect::route('instituicoes.lista', ['instituicoes' => $instituicoes]); 
        
        }

    }
    
    public function update(Request $req) {

        //dd($req->all());

        $instituition = Instituitions::find($req->id);

        $msg1 = '';
        $msg2 = '';
        $msg3 = '';

        if (strlen($req->social_name) <= 5) {
            $msg1 = "Informe um nome social válido";    
        }        

        if (strlen($req->cnpj) < 11) {
            $msg2 = "Informe um CNPJ válido";
        }

        if (intval($req->email) < 0) {
            $msg3 = "Informe uma email válido";
        }

        if ($msg1 != '' || $msg2 != '' || $msg3 != '') {

            $arr_err = Array(

                'social_name' => $msg1,
                'cnpj' => $msg2,
                'email' => $msg3          

            );

        }        

        if (isset($arr_err)) {

            return Redirect::route('instituicao.editar', [$instituition->id])->withErrors($arr_err);

        } else {


            $address = Addresses::find($instituition->fk_address);
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

            $instituition->social_name = $req->social_name;
            $instituition->cnpj = $req->cnpj;
            $instituition->email = $req->email;
            $instituition->phone_number = $req->phone_number;           
            $instituition->status = $req->status;       
            $instituition->fk_address = $fk_address;
            
            $instituition->update();

            $instituicoes = Instituitions::getInstituitions();
            return Redirect::route('instituicoes.lista', ['instituicoes' => $instituicoes]); 
        
        }

    }

    public function destroy($id) {

        $instituition = Instituitions::where('id', '=', $id)->get();
        Instituitions::destroy($instituition);

        $instituitions = Instituitions::getInstituitions();
        return Redirect::route('instituicoes.lista', ['instituicoes' => $instituitions]); 

    }





}
