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

    public function getClient($client) {
        $client = Client::where('name', $client)->get();

        return response()->json($client);
    }
}
