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
        $client = Client::where('name', $name)->without('created_at', 'updated_at')->get();

        return response()->json($client);
    }

    public function searchClient($text) {
        $client = Client::where('name', $text)->without('created_at', 'updated_at')->get();

        return response()->json($client);
    }
}
