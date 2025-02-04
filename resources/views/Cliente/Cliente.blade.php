@extends('layouts.app')
@section('content')
<h1>Clientes</h1>
<table>
    @foreach($clientes as $cliente)
    <tr>
        <td>{{ $cliente->nombre }}</td>
        <td>{{ $cliente->email }}</td>
    </tr>
    @endforeach
</table>
@endsection