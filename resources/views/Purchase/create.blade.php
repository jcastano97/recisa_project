@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nueva Venta</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('purchase.store') }}"  role="form">
                                {{ csrf_field() }}
                                @if($assig == null)
                                    <h2>No es posible realizar la acción, por favor comuniquese con un Administrador</h2>
                                @elseif(sizeof($cards) != 0)
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="number" name="client_id" id="client_id" class="form-control input-sm" placeholder="client_id">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">card_id</label>
                                                <select class="form-control" name="card_id" id="card_id">
                                                    @foreach($cards as $card)
                                                        <option value="{{$card['id']}}">{{$card['id']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h2>No hay tarjetas disponibles en inventario</h2>
                                @endif
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        @if(sizeof($cards) != 0)
                                            <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                        @endif
                                        <a href="{{ route('purchase.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection