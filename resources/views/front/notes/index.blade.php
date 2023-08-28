@extends('front.layout.master')

@section('content')

    {{-- @dd(session('success')) --}}

    @if (session('success'))  {{-- session:oturum --}}
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection
