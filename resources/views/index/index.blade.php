@extends('layouts.main', [
    'current_page' => 'home'
])


@section('content')

    <h1>Welcome to my books store</h1>

    <p>My book store is the best one ever</p>

    @foreach ($crime_books as $book)
        <div class="book">
            <h3>{{$book->title}}</h3>
            <p>{{$book->price}}</p>
            <p>{{$book->authors->pluck('name')->join(', ')}}</p>
        </div>
    @endforeach


@endsection