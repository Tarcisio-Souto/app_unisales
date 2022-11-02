<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\Loans;
use Illuminate\Http\Request;

class RegisterLoanController extends Controller
{
    public function registerLoan(Request $req) {
        
        $checkLoan = Loans::checkLoanActive($req->id_asset);
        $checkAsset = Assets::searchAsset($req->id_asset);

        if (isset($checkLoan[sizeof($checkLoan) - 1]->status)) {
            if ($checkLoan[sizeof($checkLoan) - 1]->status == 0) {
                return response()
                ->json(['message' => 'Este objeto está em uso no momento.', 'status' => '400']);
            }
    
            if ($checkLoan[sizeof($checkLoan) - 1]->status == 2) {
                $loan = new Loans();
                $dt_loan = date("Y-m-d H:i:s");
                $dt_devolution = date("Y-m-d H:i:s");
    
                $loan->fk_user = $req->id;
                $loan->fk_asset = $req->id_asset;
                $loan->dt_loan = $dt_loan;
                $loan->dt_devolution = $dt_devolution;
                $loan->status = 0;
                $loan->comments = '';
                $loan->save(); 
                return response()
                ->json(['message' => 'Empréstimo registrado com sucesso.', 'status' => '200', 'statusOjb' => $checkLoan[0]->status]);
            }
        } else {

            if (isset($checkAsset[0]->id)) {
                $loan = new Loans();
                $dt_loan = date("Y-m-d H:i:s");
                $dt_devolution = date("Y-m-d H:i:s");
    
                $loan->fk_user = $req->id;
                $loan->fk_asset = $req->id_asset;
                $loan->dt_loan = $dt_loan;
                $loan->dt_devolution = $dt_devolution;
                $loan->status = 0;
                $loan->comments = '';
                $loan->save(); 
                return response()
                ->json(['message' => 'Empréstimo registrado com sucesso.', 'status' => '200', 'statusOjb' => $checkLoan[0]->status]);
            } else {
                return response()
            ->json(['message' => 'Este objeto não está registrado ou o QR-Code/Cód. de barras é inválido.', 'status' => '404']);
            }

        }
    }

    public function listLoansUser(Request $req) {

        $loans = Loans::listLoansUser($req->id);
        if (isset($loans[0]->lo_id)) {
            return response()
            ->json($loans);
        } else {
            return response()
            ->json(['message' => 'Não há nenhum empréstimo registrado para este usuário.', 'status' => '400']);
        }

    }


}
