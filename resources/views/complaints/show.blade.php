<!-- resources/views/complaints/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Complaint</h1>
    <p>ID: {{ $complaint->id }}</p>
    <p>Judul: {{ $complaint->title ?? 'Tidak ada judul' }}</p>
    <p>Deskripsi: {{ $complaint->description ?? 'Tidak ada deskripsi' }}</p>
@endsection
