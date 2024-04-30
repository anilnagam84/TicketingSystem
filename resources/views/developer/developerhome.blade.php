

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    .table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .table th,
    .table td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    .table thead {
        background-color: #dddddd;
    }
</style>

    </style>
</head>



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Developer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-center"><h1>Developer Tickets</h1></h3>

                    <div class="flex justify-center">
                    <table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($escalatedTickets as $ticket)
        <tr>
            <td>{{ $ticket->title }}</td>
            <td>{{ $ticket->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</html>
