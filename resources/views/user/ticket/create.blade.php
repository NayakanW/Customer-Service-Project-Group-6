@extends('layouts.user')

@section('title', 'Create Ticket')
@section('header', 'Create New Ticket')

@section('content')
<div class="create-ticket-container">
    <div class="create-ticket-form">
        <h2>Buat Ticket Baru</h2>
        <form action="{{ route('user.ticket.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required placeholder="Masukkan subject ticket">
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required placeholder="Jelaskan masalah Anda"></textarea>
            </div>
            
            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name="priority" required>
                    <option value="">Pilih priority</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            
            <div class="form-actions">
                <a href="{{ route('user.ticket') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-submit">Submit Ticket</button>
            </div>
        </form>
    </div>
</div>
@endsection 