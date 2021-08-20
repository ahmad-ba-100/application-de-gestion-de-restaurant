<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Sales;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class SalesExport implements FromView
{
    private $from;
    private $to;
    private$sales;
    private $total;

    public function __construct($from,$to)
    {
        $this->from=$from;
        $this->to=$to;
        $this->sales= Sales::whereBetween("created_at", [$from, $to])
        ->where("status_payment", "paid")->get();
        $this->total=$this->sales->sum("tota_reçu");
        
    }
    public function view(): View
    {
        return view('rapports.export', [
            'total' => $this->total,
            'sales' => $this->sales,
            'to' => $this->to,
            'from' => $this->from,
        ]);
    }
}