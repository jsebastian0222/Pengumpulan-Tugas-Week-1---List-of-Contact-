@extends("template.main")
@section('title', 'Contact List')
@section('body')
<div class="container mt-5">
    <h2>Contact List</h2>
    <div class="list-group">
        @forelse ($contacts as $index => $contact)
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div>
                    Full Name: {{ $contact['full_name'] }}<br>
                    Email: {{ $contact['email'] }}<br>
                    Phone: {{ $contact['phone'] }}<br>
                    Message: {{ $contact['message'] }}
                </div>
                <form action="{{ route('contact.deleteCookies', ['index' => $index]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="index" value="{{ $index }}">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        @empty
            <p>No contact data available.</p>
        @endforelse
    </div>
</div>
@endsection
