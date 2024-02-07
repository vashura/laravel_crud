<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes_row=Client::paginate(5);
        return view('client.index')->with('listado_clientes',$clientes_row);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('client.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //definir algunas reglas de validacion para el formulario
        $request->validate([
            'name' => 'required|max:15',
            'due'=>'required|gte:1',

        ]);

        // del request se especifican que parametros se van a utilizar con la funcion only
        //hace el insert de forma masiva
        $client = Client::create($request->only('name','due','comments'));

        //usando variables de session
        Session::flash('mensaje','registro creado con exito!');

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
        return view('client.form')->with('cliente',$client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $request->validate([
            'name' => 'required|max:100',
            'due'=>'required|gte:1',

        ]);

        // hace el update de forma indivudual
        $client->name=$request['name'];
        $client->due=$request['due'];
        $client->comments=$request['comments'];
        $client->save();
        
        //usando variables de session
        Session::flash('mensaje','Registro Editado con exito!');

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        
        //usando variables de session
        Session::flash('mensaje','Registro Eliminado con exito!');

        return redirect()->route('client.index');
    }
}
