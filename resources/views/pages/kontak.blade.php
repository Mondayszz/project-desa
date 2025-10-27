@extends('layouts.app')
@section('content')
<h2 class="fw-bold mb-3">Kontak Desa</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>Alamat:</strong> {{ $kontak['alamat'] }}</li>
    <li class="list-group-item"><strong>Telepon:</strong> {{ $kontak['telepon'] }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $kontak['email'] }}</li>
</ul>
@endsection
