<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    public function index()
    {
        $adviser = Auth::user()->adviser()->first();
        $purchases = $adviser->purchases()->paginate(15);
        return view('Purchase.index',compact('purchases'));
    }

    public function create()
    {
        $assigment = Auth::user()->adviser()->first()->actual_assigment()->first();
        if ($assigment != null) {
            $cards = [];
            $station = $assigment->station()->first();
            $inventories = $station->inventories()->get();
            foreach ($inventories as $inventory) {
                array_push($cards, $inventory->card()->first());
            }
        }
        return view('purchase.create', ['cards' => $cards, 'assig' => $assigment]);
    }

    public function store(Request $request)
    {
        $this->validate($request,['client_id'=>'required', 'card_id'=>'required']);
        if(\App\User::find($request->client_id) != null) {
            $card = \App\Card::find($request->card_id)->first();
            $inventory = $card->inventory()->first();
            \App\Purchase::create([
                'amount' => 5000,
                'adviser_id' =>  Auth::user()->adviser()->first()->id,
                'client_id' => $request->client_id,
                'inventory_id' => $inventory->id,
            ]);
            $card->enabled = true;
            $card->client_id = $request->client_id;
            $card->save();
            $inventory->egress_date = Carbon::now();
            $inventory->save();
            return redirect()->route('purchase.index')->with('success','Registro creado satisfactoriamente');
        } else {
            return back()->withErrors(['el client_id no es valido']);
        }
    }

    public function show($id)
    {
        $purchase=\App\Purchase::find($id);
        return view('purchase.show',compact('purchase'));
    }
}
