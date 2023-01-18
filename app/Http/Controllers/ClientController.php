<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request) {
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'id_number' => $request->id_number
        ]);

        return redirect('/');
    }

    public function getClient($id) {
        $client = Client::find($id);

        return response()->json($client);
    }

    public function getClientByName($name) {
        $client = Client::select(['id', 'name', 'email', 'id_number'])->where('name', $name)->first();

        return response()->json($client);
    }

    public function searchClient($text) {
        $client = Client::where('name', 'LIKE', "%{$text}%")->get();

        return response()->json($client);
    }

    public function getBills($client) {
        $bills = Bill::where('client_id', $client)->get();

        return response()->json($bills);
    }

    public function getByValue($value) {
        $bills = Bill::where('value', '>', $value)->get();

        return response()->json($bills);
    }

    public function betweenValues($value1, $value2) {
        $bills = Bill::whereBetween('value', [$value1, $value2])->get();

        return response()->json($bills);
    }

    public function orderClients() {
        $clients = Client::orderBy('name', 'asc')->limit(2)->get();

        return response()->json($clients);
    }
}
