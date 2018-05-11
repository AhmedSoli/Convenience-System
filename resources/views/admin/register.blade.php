@extends('layouts.AdminPanel')
@section('content')
<div class="row w3-center">
    @include('app.flash')
</div>
<div class="container">
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading w3-center">Register new Consumer</div>
            <div class="panel-body w3-center">
                @include('forms.StoreConsumer')
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading w3-center">Register new Admin</div>
            <div class="panel-body">
                @include('forms.StoreAdmin')
            </div>
        </div>
    </div>
</div>

@endsection