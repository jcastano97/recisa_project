<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients=\App\Client::orderBy('id','DESC')->paginate(15);
        return view('Client.index',compact('clients'));
    }

    public function create()
    {
        return view('Client.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,['identification_type'=>'required', 'identification_number'=>'required', 'name'=>'required', 'phone'=>'required', 'email'=>'required']);
        \App\Client::create($request->all());
        return redirect()->route('client.index')->with('success','Registro creado satisfactoriamente');
    }

    public function show($id)
    {
        $client=\App\Client::find($id);
        return  view('client.show',compact('client'));
    }

    public function edit($id)
    {
        $client=\App\Client::find($id);
        return  view('client.edit',compact('client'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['identification_type'=>'required', 'identification_number'=>'required', 'name'=>'required', 'phone'=>'required', 'email'=>'required']);

        \App\Client::find($id)->update($request->all());
        return redirect()->route('client.index')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        \App\Client::find($id)->delete();
        return redirect()->route('client.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
