<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Tickets</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .text-green { color: green; }
            .text-blue { color: blue; }
            .text-red { color: red; }
            .table td {
                max-width: 300px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .text-green { color: green; }
            .text-blue { color: blue; }
            .text-red { color: red; }
            .table td {
                max-width: 300px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .table-bordered {
                border: 1px solid #dee2e6;
            }
            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
        function fetchDescription(url, userName) {
            axios.get(url)
                .then(response => {
                    const description = response.data.description;
                    displayCenteredAlert(description, userName);
                })
                .catch(error => {
                    console.log(error);
                });
        }

        function displayCenteredAlert(description, userName) {
            const alertContainer = document.createElement('div');
            alertContainer.style.display = 'flex';
            alertContainer.style.alignItems = 'center';
            alertContainer.style.justifyContent = 'center';
            alertContainer.style.height = '100vh';
            alertContainer.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            alertContainer.style.position = 'fixed';
            alertContainer.style.top = '0';
            alertContainer.style.left = '0';
            alertContainer.style.width = '100%';
            alertContainer.style.zIndex = '9999';

            const alertBox = document.createElement('div');
            alertBox.style.backgroundColor = 'white';
            alertBox.style.padding = '20px';
            alertBox.style.borderRadius = '5px';
            alertBox.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
            alertBox.style.maxWidth = '500px';
            alertBox.style.textAlign = 'center';

            const userNameElement = document.createElement('p');
            userNameElement.textContent = `DESCRIPTION`;
            userNameElement.style.fontWeight = 'bold';
            userNameElement.style.marginBottom = '10px';

            const alertText = document.createElement('p');
            alertText.textContent = description;

            const closeButton = document.createElement('button');
            closeButton.textContent = 'Close';
            closeButton.style.marginTop = '10px';
            closeButton.addEventListener('click', () => {
                document.body.removeChild(alertContainer);
            });

            alertBox.appendChild(userNameElement);
            alertBox.appendChild(alertText);
            alertBox.appendChild(closeButton);
            alertContainer.appendChild(alertBox);
            document.body.appendChild(alertContainer);
        }
        </script>
    </head>
    <body>


        <div class="flex justify-center">
            <div class="w-full max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-center">
                        <div class="p-6 text-gray-900">
                            <h2 class="text-2xl font-semibold">{{ __("My TICKETS") }}</h2>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        @if($tickets->count() > 0)
                            <table class="w-full min-w-full divide-y divide-gray-200 table">
                            <thead class="bg-gray-50">
    <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            <h3>Title</h3>
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            <h3>Description</h3>
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            <h3>Category</h3>
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            <h3>Status</h3>
        </th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            <h3>Priority</h3>
        </th>

    </tr>
</thead>

<tbody class="bg-white divide-y divide-gray-200">
    @foreach($tickets as $ticket)
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->title }}</td>
        <td class="px-6 py-4 whitespace-nowrap">
            <button type="button" class="btn btn-primary" onclick="fetchDescription('{{ route('tickets.show', $ticket->id) }}', '{{ $ticket->user->name ?? '' }}')">Show Description</button>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->category }}</td>
        <td class="px-6 py-4 whitespace-nowrap">
            @if($ticket->status == 'Resolved')
                <span class="text-green">{{ $ticket->status }}</span>
            @elseif($ticket->status == 'Open')
                <span class="text-blue">{{ $ticket->status }}</span>
            @elseif($ticket->status == 'Rejected')
                <span class="text-red">{{ $ticket->status }}</span>
            @else
                {{ $ticket->status }}
            @endif
        </td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $ticket->priority }}</td>
       <!-- <td class="px-6 py-4  whitespace-nowrap">{{ $ticket->user->name ?? 'N/A' }}</td> -->
        <td class="px-6 py-4 whitespace-nowrap">
            <!-- <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" class="inline">
                @csrf
                @method('PUT')

                <button type="submit" class="btn btn-primary" onclick="changeStatus('{{$ticket->id}}', 'escalated')">Assign</button>
                <button type="submit" class="btn btn-success" onclick="changeStatus('{{$ticket->id}}', 'resolved')">Approve</button>
            <button type="submit" class="btn btn-danger" onclick="changeStatus('{{$ticket->id}}', 'rejected')">Reject</button> -->
<!--
                <input type="hidden" name="status" id="statusInput_{{$ticket->id}}">
    </form> -->
        </td>
    </tr>
    @endforeach
</tbody>
        </table>
                        @else
                            <p>No tickets found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
</x-app-layout>
