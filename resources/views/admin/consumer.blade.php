@extends('layouts.AdminPanel')
@section('content')
<div class="row w3-center">
    @include('app.flash')
</div>
<div class="container">
    <div class="row w3-padding">
        <div class="pull-left">
            @if ($consumer->pfand == true) 
            <img src="/images/keyid.png" alt="Key Fob" width="50px" data-toggle="tooltip" title="Paid Deposit">
            @endif
        </div>
        <div class="pull-right">
            <div class="wrap"  style="display:inline-block;">
                <button type="button" class="btn btn-info" data-target="#update" data-toggle="modal">Edit</button>
                <div class="modal fade" id="update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title w3-center">Update Information</h4>
                            </div>
                            <div class="modal-body">
                                @include('forms.UpdateConsumer')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap" style="display:inline-block;">
                @if ($consumer->active == true)
                @include('forms.DeactivateConsumer')

                @else
                @include('forms.ActivateConsumer')
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container w3-center">
    @if ($consumer->active == false)
    <div style="cursor:not-allowed">

        <div class="wrap" style="opacity: 0.5;pointer-events:none;" id="disable" >
            @endif

            <div class="row">
                <div class="col-xs-6">
                    @include('panels.ViewOrders')
                </div>
                <div class="col-xs-6">
                    @include('panels.ViewTransactions')
                </div>
            </div>
            <div class="row">
                <h3>Credit</h3>
            </div>
            <div class="row">
                <h3 class="w3-tag w3-round w3-padding w3-light-grey"> 
                    {{$consumer->betrag}}€
                </h3>
            </div>
            <div class="row">
                <div class="col-xs-5">
                    @include('forms.StoreNegativeTransfer')
                </div>
                
                <div class="col-xs-2">
                    
                </div>
                <div class="col-xs-5">
                    @include('forms.StorePositiveTransfer')
                </div>


            </div>
            @if ($consumer->active == false)
        </div>
    </div>
    @endif
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@stop