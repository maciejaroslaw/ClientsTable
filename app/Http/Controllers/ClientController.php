<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return $clients;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'city' => 'required|alpha',
        ]);

        $client = new Client();
        $client->name = $request['name'];
        $client->surname = $request['surname'];
        $client->city = $request['city'];
        $client->save();

        return 'Done';
    }

    public function destroy($clientID)
    {
        $client = Client::find($clientID);
        $client->delete();
        return 'Done';
    }

    public function update($clientID, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'city' => 'required|alpha',
        ]);

        $client = Client::find($clientID);
        $client->name = $request['name'];
        $client->surname = $request['surname'];
        $client->city = $request['city'];
        $client->save();


        return 'Done'; 
    }

}





