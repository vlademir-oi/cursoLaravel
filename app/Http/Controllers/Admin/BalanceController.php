<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;


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

    public function depositStore(MoneyValidationFormRequest $request)
    {
        //dd($request->valor);
       // $balance->deposito($request->valor);
       $balance = auth()->user()->balance()->firstOrCreate([]);
       //$balance->deposit($request->valor);
       $response =  $balance->deposit($request->valor);

        if($response['success'])
            return redirect()
            ->route('admin.balance')
            ->with('success', 'Sucesso ao recarregar');
        
        return redirect()
         ->back()
         ->with('error', 'Erro ao carregar');

    }



}
