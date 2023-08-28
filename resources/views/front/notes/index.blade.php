@extends('front.layout.master')

@section('content')

    <a class="btn btn-success" href="{{ route('notes.createPage') }}">Not Oluştur</a>

    {{-- @dd(session('success')) --}}

    @if (session('success'))  {{-- session:oturum --}}
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection
