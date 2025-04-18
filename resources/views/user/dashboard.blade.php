@extends('layouts.user')

@section('title', 'Dashboard User')

@section('content')
  <div class="illustration">
    <img src="{{ asset('images/illustration.png') }}" alt="Illustration">
  </div>
  <div class="buttons">
    <button class="ticket-btn">🎟 Ticket</button>
    <button class="message-btn">✉ Message</button>
  </div>
@endsection
