<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Loans;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoansController extends Controller
{
    
    public function create() {

        $loans = Loans::listAllLoans();
        $categories = Categories::listAllCategories();        
        return Inertia::render('Loans/AddLoan.vue', ['loans' => $loans, 'categories' => $categories]);

    }



}
