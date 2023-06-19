<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md">
            <h2 class="text-2xl font-bold mb-6">Ticket Creation</h2>
            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title" class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" rows="3" class="border border-gray-300 rounded w-full py-2 px-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // JavaScript code to display the ticket creation form as a pop-up
        document.getElementById('createTicketButton').addEventListener('click', function() {
            document.getElementById('ticketCreationModal').style.display = 'flex';
        });
    </script>
</x-app-layout>
