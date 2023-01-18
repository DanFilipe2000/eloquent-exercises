<?php

namespace App\Http\Controllers;

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
        $client = Client::select(['id'])->where('name', 'LIKE', "%{{ $text }}%")->first();

        return response()->json($client);
    }
}
