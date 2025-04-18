@extends('layouts.user')

@section('title', 'Profile')

@section('header', 'Profile')
    
@section('content')
  <div class="profile-container">
    <h2>Profil Pengguna</h2>
    <div class="profile-content">
        <p>*Halaman profile pengguna akan segera tersedia.</p>
    </div>
    {{-- <p>Nama: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    <!-- Tambahkan info lain sesuai kebutuhan --> --}}
  </div>
@endsection
