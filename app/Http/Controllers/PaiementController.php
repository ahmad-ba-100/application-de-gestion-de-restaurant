<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Table;
use App\Models\Category;
use App\Models\Servants;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    
    {    
         return view('paiement.index')->with([
            
            "tables"=>Table::all(),
            "categories"=>Category::all(),
            "serveurs"=>Servants::all()
        ]
    );
    }
}
