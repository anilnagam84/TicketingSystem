<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </div>

    </x-slot>

    <div class="flex justify-center">
        <div class="w-full max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-semibold">{{ __("TICKETS") }}</h2>
                    </div>
                </div>

                <div class="flex justify-center">
                    @if($tickets->count() > 0)
                    <table class="w-full min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <h2>Title</h2>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <h2>Description</h2>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <h2>Status</h2>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <h2>Priority</h2>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <h1>Actions</h1>
                                </th>
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
                                    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="escalated">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Approve</button>
                                    </form>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-md">Reject</button>
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
    </div>
    </x-app-layout>
