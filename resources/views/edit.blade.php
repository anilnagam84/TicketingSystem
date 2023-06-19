<form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $ticket->title }}">
    <textarea name="description">{{ $ticket->description }}</textarea>
    <button type="submit">Update</button>
</form>
