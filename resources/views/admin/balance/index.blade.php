@extends('adminlte::page')

@section('title', 'Home Admin')

@section('content_header')
    <h1 class="m-0 text-dark">Saldo</h1>

    <ol class="breadcrumb">
      
        <li class="active">Saldo</li>
      </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
           
                <a href="{{route('balance.deposit')}}" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Regarregar</a>
                <a href="" class="btn btn-danger"><i class="fas fa-cart-arrow-down"></i> sacar</a>
               
            </div>
                <div class="card-body">
                <div class="col-lg-3 col-xs-6">

               
                <p> @include('admin.includes.alerts')</p>
               
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
          
              <h3>R$ {{number_format($amount,2, '.','')}}<sup style="font-size: 20px"></sup></h3>
            </div>
            <div class="icon">
              <i class="far fa-money-bill-alt"></i>
            </div>
            <a href="#" class="small-box-footer">Histórico <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                </div>
            </div>
        </div>
    </div>
@stop
