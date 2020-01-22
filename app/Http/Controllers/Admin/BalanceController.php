<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    //
    public function index()
    {
      
       //variavel criada para receber valor saldo
        $balance = auth()->user()->balance;
        //se nao existir valor mostra 0.
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(Request $request)
    {
        dd($request->all());
    }



}
