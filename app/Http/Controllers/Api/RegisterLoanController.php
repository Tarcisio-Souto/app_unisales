<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Loans;
use Illuminate\Http\Request;

class RegisterLoanController extends Controller
{
    public function registerLoan(Request $req) {
        
        $inUse = 0;
        $notExists = 0;

        $checkLoan = Loans::checkLoanActive($req->id_asset);
        if (isset($checkLoan[0]->id)) {
            $inUse = 1;
        } else if (!isset($checkLoan[0]->id)) {
            $notExists = 1;
        }
        
        $loan = new Loans();
        $dt_loan = date("Y-m-d H:i:s");
        $dt_devolution = date("Y-m-d H:i:s");

        $loan->fk_user = $req->id;
        $loan->fk_asset = $req->id_asset;
        $loan->dt_loan = $dt_loan;
        $loan->dt_devolution = $dt_devolution;
        $loan->status = 0;
        $loan->comments = '';
        

        if ($inUse == 0) {
            $loan->save(); 
            return response()
            ->json(['message' => 'Empréstimo registrado com sucesso.', 'status' => '200']);
        } else if ($inUse == 1){
            return response()
            ->json(['message' => 'Este objeto está em uso no momento.', 'status' => '400']);
        } else if ($notExists == 1) {
            return response()
            ->json(['message' => 'Este objeto não está registrado ou o QR-Code é inválido.', 'status' => '404']);
        }


    }

    public function listLoansUser(Request $req) {

        $loans = Loans::listLoansUser($req->id);
        if (isset($loans[0]->lo_id)) {
            return response()
            ->json(['message' => 'Empréstimos encontrados.', 'status' => '200', 'loans' => $loans]);
        } else {
            return response()
            ->json(['message' => 'Não há nenhum empréstimo registrado para este usuário.', 'status' => '400']);
        }

    }


}
