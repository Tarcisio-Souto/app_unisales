<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Categories;
use App\Models\Loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LoansController extends Controller
{

    public function listAllLoans() {

        //$loans = Loans::listAllLoans();
        return Inertia::render('Loans/ListAllLoans.vue');

    }

    public function listLoans() {

        $loans = Loans::listAllLoans();
        return response()->json($loans);

    }

    public function create() {
        
        $categories = Categories::listAllCategories();        
        return Inertia::render('Loans/AddLoan.vue', ['categories' => $categories]);

    }

    public function store(Request $req) {

        $size_vector = sizeof($req->all());

        //dd($req->all());

        for ($i = 0; $i < $size_vector; $i++) {

            $loans = new Loans();

            $dt_loan = explode("/",$req[$i]['dt_loan']);
            $day = $dt_loan[0];
            $mouth = $dt_loan[1];
            $year = $dt_loan[2];            
            $data_format = $year.'-'.$mouth.'-'.$day;
            $dt_loan_ok = date($data_format);
            $loans->dt_loan = $dt_loan_ok .' '. $req[$i]['hr_loan'] .':00';

            $dt_devolution = explode("/",$req[$i]['dt_devolution']);
            $day = $dt_devolution[0];
            $mouth = $dt_devolution[1];
            $year = $dt_devolution[2];            
            $data_format = $year.'-'.$mouth.'-'.$day;
            $dt_devolution_ok = date($data_format);
            $loans->dt_devolution = $dt_devolution_ok .' '. $req[$i]['hr_devolution'] .':00';

            $asset = explode("-",$req[$i]['asset']);
            $id_asset = trim($asset[0]);
            $loans->fk_asset = $id_asset;

            $status = $req[$i]['status'];
            if ($status == "Locado") {
                $status = 0;
            } else {
                $status = 1;
            }

            $loans->status = $status;
            $loans->comments = $req[$i]['comments'];

            $user = explode("-",$req[$i]['user_id']);
            $id_user = trim($user[0]);
            $loans->fk_user = $id_user;

            $loans->save();

            $loans = Loans::listAllLoans();
            return Redirect::route('emprestimos.lista', ['loans' => $loans]); 

        }        

    }

}
