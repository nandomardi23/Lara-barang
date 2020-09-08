<?php

namespace App\Exports;

use App\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CostumerExcel implements FromView
{
    /**
     * @return \Illuminate\Support\FromView
     */
    public function view(): View
    {
        return view('exports.customerEcxel', ['customers' => Customer::all()]);
    }
}
