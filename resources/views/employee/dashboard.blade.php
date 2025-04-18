@extends('layouts.app')

@section('content')
<aside class="sidebar">
  <div class="logo">
    <img src="{{ asset('images/placeholder-logo.png') }}" alt="Logo">
  </div>
  <nav>
    <ul>
      <li><a href="#">Profile</a></li>
      <li><a href="#">History</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Help</a></li>
      <li><a href="#">Report</a></li>
      <li><a href="#">More</a></li>
      <li><a href="#">Offline</a></li>
      <li><a href="#">Log Out</a></li>
    </ul>
  </nav>
</aside>
<main>
  <header class="topbar">
    <h1>Customer Service</h1>
  </header>
  <section class="content">
    <div class="illustration">
      <img src="{{ asset('images/employee-illustration.png') }}" alt="Illustration">
    </div>
    <div class="buttons">
      <button class="ticket-btn">🎟 Ticket</button>
      <button class="message-btn">✉ Message</button>
      <button class="phone-btn">📞 Phone</button>
    </div>
  </section>
</main>
@endsection
