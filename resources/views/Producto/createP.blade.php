@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Registro de Producto</h2>
    
    <form action="{{route('Producto.store')}}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto">
        @csrf
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
            
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                    Nombre *
                </label>
                <input type="text" name="nombre" id="nombre"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    required>
            </div>

            <div class="mb-4 md:col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                    Descripción
                </label>
                <textarea name="descripcion" id="descripcion"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    rows="3"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                    Precio *
                </label>
                <input type="number" name="precio" id="precio"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    step="0.01" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">
                    Stock *
                </label>
                <input type="number" name="stock" id="stock"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">
                    Categoría
                </label>
                <select name="categoria" id="categoria"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                    <option value="">Seleccione una categoría</option>
                    <option value="Electrónicos">Electrónicos</option>
                    <option value="Ropa">Ropa</option>
                    <option value="Alimentos">Alimentos</option>
                    <option value="Hogar">Hogar</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="unidad_medida">
                    Unidad de Medida
                </label>
                <select name="unidad_medida" id="unidad_medida"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                    <option value="Unidad">Unidad</option>
                    <option value="Kg">Kilogramo</option>
                    <option value="Lt">Litro</option>
                    <option value="Mt">Metro</option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('Producto.index') }}" 
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4">
                Cancelar
            </a>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Guardar Producto
            </button>
        </div>
    </form>
    <div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Listado de Productos</h2>
    
    <table id="productosTable" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Precio</th>
                <th class="px-4 py-2">Stock</th>
                <th class="px-4 py-2">Categoria</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr class="border-b text-center">
                <td class="px-4 py-2">{{ $producto->id }}</td>
                <td class="px-4 py-2">{{ $producto->nombre }}</td>
                <td class="px-4 py-2">{{ $producto->descripcion }}</td>
                <td class="px-4 py-2">{{ $producto->precio }}</td>
                <td class="px-4 py-2">{{ $producto->stock }}</td>
                <td class="px-4 py-2">{{ $producto->categoria }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('Producto.edit', $producto->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                    <form action="{{ route('Producto.destroy', $producto->id) }}" method="POST" class="inline">
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

<script>
    $(document).ready(function() {
        $('#productosTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json" // Traducir al español
            }
        });
    });
</script>
</div>
@endsection
