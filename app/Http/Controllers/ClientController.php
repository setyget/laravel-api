<?php

namespace App\Http\Controllers;

use App\Models\Client;
 use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        //return clients list to json response
        return response()->json($clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        $client->address  = $request->address;
        $client->save();
        $data = [
            'message' => 'Client creado correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        $client->address  = $request->address;
        $client->save();
        $data = [
            'message' => 'Client actualizado correctamente',
            'client' => $client
        ];
        return response()->json($data); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $data = [
            'message' => 'Client eliminado correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }

    public function attach(Request $request)
    {
        $client = Client::find($request->client_id);
        $client->groups()->attach($request->group_id);
        $data = [
            'message' => 'Group agregado correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }

    public function displayClientGroups(Client $client)
    {
        $data = [
            'message' => 'Groups del cliente',
            'client' => $client,
            'groups' => $client->groups
        ];
        return response()->json($data);
    }


    public function clientAndGroups(Client $client)
    {
        $clients = Client::all();
        $array = [];
        foreach ($clients as $client) {
            $array[] = [
                'id' => $client->id,
                'name' => $client->name,
                'email' => $client->email,
                'phone_number' => $client->phone_number,
                'address' => $client->address,
                'groups' => $client->groups
            ];
        }
        return response()->json($array);
    }

    public function detach(Request $request)
    {
        $client = Client::find($request->client_id);
        $client->groups()->detach($request->group_id);
        $data = [
            'message' => 'Group eliminado correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }
    
}
