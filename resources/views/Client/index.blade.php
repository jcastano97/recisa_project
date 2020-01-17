@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Clientes</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('client.create') }}" class="btn btn-info" >Añadir Cliente</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>identification_type</th>
                                <th>identification_number</th>
                                <th>name</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                                @if($clients->count())
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>{{$client->identification_type}}</td>
                                            <td>{{$client->identification_number}}</td>
                                            <td>{{$client->name}}</td>
                                            <td>{{$client->phone}}</td>
                                            <td>{{$client->email}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('ClientController@edit', $client->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('ClientController@destroy', $client->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                </form>
                                            </td>
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
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection