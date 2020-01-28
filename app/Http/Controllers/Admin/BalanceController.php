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
            ->with('success', $response['message']);
        
        return redirect()
         ->back()
         ->with('error', $response['message']);

    }


    public function withdrawn()
    {
        return view('admin.balance.withdrawn');
    }


    public function withdrawnStore(MoneyValidationFormRequest $request)
    {
        //dd($request->valor);
       // $balance->deposito($request->valor);
       $balance = auth()->user()->balance()->firstOrCreate([]);
       //$balance->deposit($request->valor);
       $response =  $balance->withdrawn($request->valor);

        if($response['success'])
            return redirect()
            ->route('admin.balance')
            ->with('success', $response['message']);
        
        return redirect()
         ->back()
         ->with('error', $response['message']);

    }


}
