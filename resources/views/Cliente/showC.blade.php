@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Editar Cliente</h2>
    
    <form action="{{ route('Cliente.update', $cliente->rut) }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto">
        @csrf
        @method('PUT') <!-- Usar PUT para actualizar -->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rut">
                    RUT *
                </label>
                <input type="text" name="rut" id="rut" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $cliente->rut }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                    Nombre Completo *
                </label>
                <input type="text" name="nombre" id="nombre"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $cliente->nombre }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email *
                </label>
                <input type="email" name="email" id="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $cliente->email }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
                    Teléfono *
                </label>
                <input type="tel" name="telefono" id="telefono"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $cliente->telefono }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
                    Dirección
                </label>
                <input type="text" name="direccion" id="direccion"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $cliente->direccion }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ciudad">
                    Ciudad
                </label>
                <input type="text" name="ciudad" id="ciudad"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $cliente->ciudad }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo_cliente">
                    Tipo Cliente
                </label>
                <select name="tipo_cliente" id="tipo_cliente"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                    <option value="regular" {{ $cliente->tipo_cliente == 'regular' ? 'selected' : '' }}>Regular</option>
                    <option value="preferencial" {{ $cliente->tipo_cliente == 'preferencial' ? 'selected' : '' }}>Preferencial</option>
                    <option value="corporativo" {{ $cliente->tipo_cliente == 'corporativo' ? 'selected' : '' }}>Corporativo</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('Cliente.index') }}" 
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar Cliente
                </button>
            </div>
        </div>
    </form>
</div>
@endsection