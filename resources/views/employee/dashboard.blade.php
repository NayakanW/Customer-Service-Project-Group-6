@extends('layouts.employee')

@section('title', 'Dashboard Employee')

@section('content')
  <div class="illustration">
    <img src="{{ asset('images/illustration.png') }}" alt="Illustration">
  </div>
  <div class="buttons">
    <button class="ticket-btn">🎟 Ticket</button>
    <button class="message-btn">✉ Message</button>
    <button class="phone-btn">📞 Phone</button>
  </div>
@endsection
