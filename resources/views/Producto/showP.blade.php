@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Editar Producto</h2>

    <form action="{{ route('Producto.update', $producto->id) }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                    Nombre *
                </label>
                <input type="text" name="nombre" id="nombre"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $producto->nombre }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                    Descripción
                </label>
                <textarea name="descripcion" id="descripcion"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">{{ $producto->descripcion }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                    Precio *
                </label>
                <input type="number" name="precio" id="precio"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $producto->precio }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">
                    Stock *
                </label>
                <input type="number" name="stock" id="stock"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500"
                    value="{{ $producto->stock }}" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">
                    Categoría
                </label>
                <select name="categoria" id="categoria"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                    <option value="Electronicos" {{ $producto->categoria == 'Electronicos' ? 'selected' : '' }}>Electronicos</option>
                    <option value="Ropa" {{ $producto->categoria == 'Ropa' ? 'selected' : '' }}>Ropa</option>
                    <option value="Alimentos" {{ $producto->categoria == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
                    <option value="Hogar" {{ $producto->categoria == 'Hogar' ? 'selected' : '' }}>Hogar</option>
                </select>
            </div>
            

            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('Producto.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4">
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar Producto
                </button>
            </div>
        </div>
    </form>
</div>
@endsection