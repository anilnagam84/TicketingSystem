<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8 w-full md:max-w-lg"> <!-- Increased max width -->
                <h2 class="text-2xl font-bold mb-6">Create Ticket</h2>
                <form action="{{ route('tickets.store') }}" method="POST">
                    @csrf
                    <div class="mb-6"> <!-- Increased margin-bottom -->
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                        <input type="text" name="title" id="title" class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-6"> <!-- Increased margin-bottom -->
                        <label for="category" class="block text-gray-700 font-bold mb-2">Category:</label>
                        <select name="category" id="category" class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Select a category</option>
                            <option value="Technical Issues">Technical Issues</option>
                            <option value="Feature Requests">Feature Requests</option>
                            <option value="Installation and Setup">Installation and Setup</option>
                            <option value="User Guidance">User Guidance</option>
                            <option value="Account and Licensing">Account and Licensing</option>
                            <option value="Security and Privacy">Security and Privacy</option>
                            <option value="Integration and API">Integration and API</option>
                            <option value="Performance Optimization">Performance Optimization</option>
                            <!-- Add more category options as needed -->
                        </select>
                    </div>
                    <div class="mb-6"> <!-- Increased margin-bottom -->
                        <label for="priority" class="block text-gray-700 font-bold mb-2">Priority:</label>
                        <select name="priority" id="priority" class="border border-gray-300 rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Select a priority</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="mb-6"> <!-- Increased margin-bottom -->
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                        <textarea name="description" id="description" rows="5" class="border border-gray-300 rounded w-full py-2 px-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea> <!-- Increased rows -->
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
