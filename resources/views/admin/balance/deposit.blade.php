@extends('adminlte::page')

@section('title', 'Nova Recarga')

@section('content_header')
    <h1 class="m-0 text-dark">Recarga</h1>
@stop

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
            <form  method="POST" action="{{ route('deposit.store') }}">
            {!! csrf_field() !!}
                <div class="form-group">
                    <input name="valor" class="text" placeholder="valor Recarga" class="form-control"></inpu>
                </div>
           
            </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-success">Recarregar</button>
                 </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@stop
