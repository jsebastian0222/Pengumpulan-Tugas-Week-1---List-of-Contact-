@extends("template.main")
@section('title', 'Contact Us')
@section('body')
<div class="row d-flex justify-content-center m-5">
  <!-- Contact Form Block -->
  <div class="col-xl-6">
    <h2 class="pb-4">Leave a message</h2>
    <form action="{{ route('contact.store') }}" method="POST">
      @csrf
      <div class="row g-4"> 
        <div class="col-12 mb-3">
          <label for="full_name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="full_name" name="full_name" placeholder="John Doe" required>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+1234567890" required>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-dark">Send Message</button>
      <a href="{{ url('/contactlist') }}" class="btn btn-primary">View Contact List</a>
    </form>
  </div>
</div>
@endsection