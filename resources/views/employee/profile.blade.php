@extends('layouts.employee')

@section('header', 'Profile')

@section('content')
  <div class="profile-container">
    <h2>Profil Pegawai</h2>
    {{-- <p>Nama: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p> --}}
  </div>
@endsection
