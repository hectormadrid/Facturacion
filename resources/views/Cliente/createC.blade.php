@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Registro de Cliente</h2>

    <form action="{{ route('Cliente.store') }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto">
        @csrf
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>

        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rut">
                    RUT *
                </label>
                <input type="text" name="rut" id="rut"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    placeholder="12.345.678-9" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                    Nombre Completo *
                </label>
                <input type="text" name="nombre" id="nombre"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    placeholder="Juan Pérez" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email *
                </label>
                <input type="email" name="email" id="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    placeholder="ejemplo@correo.com" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
                    Teléfono *
                </label>
                <input type="tel" name="telefono" id="telefono"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    placeholder="+56 9 1234 5678" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
                    Dirección
                </label>
                <input type="text" name="direccion" id="direccion"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    placeholder="Av. Principal 123">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ciudad">
                    Ciudad
                </label>
                <input type="text" name="ciudad" id="ciudad"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    placeholder="Santiago">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo_cliente">
                    Tipo Cliente
                </label>
                <select name="tipo_cliente" id="tipo_cliente"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                    <option value="regular">Regular</option>
                    <option value="preferencial">Preferencial</option>
                    <option value="corporativo">Corporativo</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('Cliente.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Guardar Cliente
                </button>
            </div>
        </div>
    </form>
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Listado de Clientes</h2>

    <table id="clientesTable" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden ">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">RUT</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Teléfono</th>
                <th class="px-4 py-2">Dirección</th>
                <th class="px-4 py-2">Comuna</th>
                <th class="px-4 py-2">Tipo de Cliente</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr class="border-b text-center">
                <td class="px-4 py-2">{{ $cliente->rut }}</td>
                <td class="px-4 py-2">{{ $cliente->nombre }}</td>
                <td class="px-4 py-2">{{ $cliente->email }}</td>
                <td class="px-4 py-2">{{ $cliente->telefono }}</td>
                <td class="px-4 py-2">{{ $cliente->direccion }}</td>
                <td class="px-4 py-2">{{ $cliente->ciudad }}</td>
                <td class="px-4 py-2">{{ $cliente->tipo_cliente }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('Cliente.edit', $cliente->rut) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                    <form action="{{ route('Cliente.destroy', $cliente->rut) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Script para inicializar DataTables -->
<script>
    $(document).ready(function() {
        $('#clientesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json" // Traducir al español
            }
        });
    });
</script>
</div>


@endsection