@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Ventas</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('purchase.create') }}" class="btn btn-info" >Añadir Venta</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>amount</th>
                                <th>adviser_id</th>
                                <th>client_id</th>
                                <th>inventory_id</th>
                                <th>created_at</th>
                                </thead>
                                <tbody>
                                @if($purchases->count())
                                    @foreach($purchases as $purchase)
                                        <tr>
                                            <td>{{$purchase->amount}}</td>
                                            <td>{{$purchase->adviser_id}}</td>
                                            <td>{{$purchase->client_id}}</td>
                                            <td>{{$purchase->inventory_id}}</td>
                                            <td>{{$purchase->created_at}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No hay registro !!</td>
                                    </tr>
                                @endif
                                </tbody>

                            </table>
                        </div>
                        {{ $purchases->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection