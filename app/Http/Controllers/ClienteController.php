<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all(); // Obtener todos los clientes
        return view('Cliente.createC', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rut' => 'required|unique:clientes',
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);


        Cliente::create($request->all());
        return redirect()->route('Cliente.index')->with('success', 'Cliente registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rut)
    {
        $cliente = Cliente::find($rut); // Buscar el cliente por ID
       
        return view('Cliente.showC',['cliente' => $cliente]); // Pasar el cliente a la vista de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $rut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rut)
    {
        // Validar los datos del formulario
        $request->validate([
            'rut' => 'required|unique:clientes,rut,' . $rut .',rut', // Usar 'rut' como clave primaria
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'tipo_cliente' => 'required',
        ]);

        // Buscar el cliente por RUT
        $cliente = Cliente::find($rut);

        // Actualizar los datos del cliente
        $cliente->update($request->all());

       

        $cliente->save();
        // Redirigir con un mensaje de éxito
        return redirect()->route('Cliente.index')->with('success', 'Cliente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rut)
    {
    // Buscar el cliente por ID
    $cliente = Cliente::find($rut);
    $cliente->delete();
    return redirect()->route('Cliente.index')->with('success', 'Cliente eliminado exitosamente');
    
    }
}
