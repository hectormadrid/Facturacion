<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Facturación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- jQuery (requerido por DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-xl font-bold">Facturación</a>
            <div class="hidden md:flex space-x-4">
                <a href="Cliente" class="text-white hover:bg-blue-500 px-3 py-2 rounded">Clientes</a>
                <a href="Producto" class="text-white hover:bg-blue-500 px-3 py-2 rounded">Productos</a>
                <a href="#" class="text-white hover:bg-blue-500 px-3 py-2 rounded">Facturas</a>
            </div>
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                ☰
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-blue-700">
            <a href="#" class="block text-white py-2 px-4">Clientes</a>
            <a href="#" class="block text-white py-2 px-4">Productos</a>
            <a href="#" class="block text-white py-2 px-4">Facturas</a>
        </div>
    </nav>



    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @yield('content')
</body>
</html>
