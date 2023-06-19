<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-full max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900">
                    <h1>{{ __("MY TICKETS") }}</h1>
                </div>

                @if(session('success'))
                    <div class="p-6 text-green-600 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if($tickets->count() > 0)
                <table class="w-full min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time Since</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($tickets as $ticket)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->created_at->diffForHumans() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="p-6 text-gray-500 text-center">No tickets found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
