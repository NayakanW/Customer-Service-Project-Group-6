@extends('layouts.user')

@section('title', 'Ticket')

@section('header', 'Ticket')

@section('content')
<div class="ticket-container">
    <div class="ticket-header">
        <h2>Daftar Ticket</h2>
    </div>
    
    <div class="ticket-list">
        <div class="ticket-illustration">
            <img src="{{ asset('images/bg_ticket.png') }}" alt="Ticket Illustration">
        </div>
    </div>

    <a href="{{ route('user.ticket.create') }}" class="add-ticket-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
    </a>
</div>
@endsection 