<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        //return groups list to json response
        return response()->json($groups);
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
            
            $group = new Group;
            $group->name = $request->name;
            $group->description = $request->description;
            $group->price = $request->price;
            $group->save();
            $data = [
                'message' => 'Group creado correctamente',
                'group' => $group
            ];
            return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return response()->json($group);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $group->name = $request->name;
        $group->description = $request->description;
        $group->price = $request->price;
        $group->save();
        $data = [
            'message' => 'Group actualizado correctamente',
            'group' => $group
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        $data = [
            'message' => 'Group eliminado correctamente',
            'group' => $group
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */ 
    //funcion para saber cuantos clientes tiene cada grupo
    public function clientList(Request $request)
    {

        $group = Group::find($request->group_id);
        
        $data = [
            'message' => 'Clientes del grupo',
            'info extra' => 'Se muestra el numero de clientes que tiene cada grupo',
            'Info grupo' => $group,
            'clients' => $group->clients
        ];
        return response()->json($data);
    }

 
}
