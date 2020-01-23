@extends('adminlte::page')

@section('title', 'Nova Recarga')

@section('content_header')
    <h1 class="m-0 text-dark">Sacar</h1>
@stop

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
            
            <form  method="POST" action="{{ route('withdrawn.store') }}">
            {!! csrf_field() !!}
            @include('admin.includes.alerts')
                <div class="form-group">
                    <input name="valor" class="text" placeholder="valor Retirada" class="form-control"></inpu>
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
