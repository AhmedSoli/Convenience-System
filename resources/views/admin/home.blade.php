@extends('layouts.AdminPanel')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-xs-6">
            @include('panels.ViewConsumers')
        </div>
        <div class="col-xs-6">
            @include('panels.ViewRegisters')
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            @include('panels.ViewPayments')
        </div>
        <div class="col-xs-6">
            @include('panels.ViewTransactions')
        </div>
    </div>
</div>

@endsection