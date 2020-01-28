<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Balance extends Model
{
    //
    public $timestamps = false;

    public function deposit(float $valor) : Array
    {

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($valor, 2, '.','');
        $retDeposit = $this->save();

       $historic =  auth()->user()->historics()->create([
        'type'         => 'I',
        'amount'       =>  $valor,
        'total_before' => $totalBefore,
        'total_after'  => $this->amount,
        'date'         =>  date('Ymd'),
         ]);


        if($retDeposit && $historic){
            DB::commit();
            return[
                'success' => true,
                'message' => 'Sucesso ao reccarregar'
            ];
        }else{
            DB::rollback();

        return[
            'success' => false,
            'message' => 'Falha ao reccarregar'
        ];

         }
    }


    public function withdrawn(float $valor) : Array
    {
        // vamos verificar se a pessoa possui saldo suficiente
        if ($this->amount < $valor)
        return [
            'success' => false,
            'message' => 'Saldo insuficiente para saque',
        ];



        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($valor, 2, '.','');
        $retWithdrawn = $this->save();

       $historic =  auth()->user()->historics()->create([
        'type'         => 'O',
        'amount'       =>  $valor,
        'total_before' => $totalBefore,
        'total_after'  => $this->amount,
        'date'         =>  date('Ymd'),
         ]);


        if($retWithdrawn && $historic){
            DB::commit();
            return[
                'success' => true,
                'message' => 'Sucesso ao efetuar saque'
            ];
        }else{
            DB::rollback();

        return[
            'success' => false,
            'message' => 'Falha ao recefetuar saque'
        ];

         }
    }



}
