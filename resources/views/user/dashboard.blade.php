@extends('layouts.user')

@section('title', 'User Dashboard')

@section('content')
  <div class="illustration">
    <img src="{{ asset('images/illustration.png') }}" alt="Illustration">
  </div>
  <div class="buttons">
    <a href="{{ route('user.ticket') }}" class="button-link">
      <button class="ticket-btn">🎟 Ticket</button>
    </a>
    <a href="{{ route('user.message') }}" class="button-link">
      <button class="message-btn">✉ Message</button>
    </a>
  </div>
@endsection
