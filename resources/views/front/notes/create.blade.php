@extends('front.layout.master')

@section('content')

    @if( $errors->any() ) {{-- || $errors->count() > 0 any hiç var mı diye kontrol eder, count bunu kontrol ederken tek tek sayar. buna gerek olmadığı için countdan kaçınıyoruz--}}

        <div class="alert alert-danger">
            <ul>
                @foreach( $errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>

        </div>

    @endif

    <form action="{{route('notes.addNote')}}" method="POST">
        @csrf

        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">Başlık</label>
            <input type="text" name="title" class="form-control" placeholder="Lütfen başlık giriniz." aria-describedby="emailHelp" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">İçerik</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Gönder</button>
    </form>

@endsection
