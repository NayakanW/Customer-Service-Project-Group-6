@extends('layouts.employee')

@section('title', 'Employee Dashboard')

@section('content')
  <div class="illustration">
    <img src="{{ asset('images/illustration.png') }}" alt="Illustration">
  </div>
  <div class="buttons">
    <a href="{{ route('employee.ticket') }}" class="button-link">
      <button class="ticket-btn">🎟 Ticket</button>
    </a>
    <a href="{{ route('employee.message') }}" class="button-link">
      <button class="message-btn">✉ Message</button>
    </a>
    <a href="{{ route('employee.phone') }}" class="button-link">
      <button class="phone-btn">📞 Phone</button>
    </a>
  </div>
@endsection
