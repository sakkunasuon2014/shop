@extends('layout.backend')

@section('content')
    <h1>Book details</h1>
    <p>title: {{$book->title}}</p>
    <p>description: {{$book->description}}</p>
    <p>author: {{$book->author}}</p>
    <p>year: {{$book->year}}</p>
    <a class="btn btn-secondary" href="{{route('book.index')}}">Back</a>
@endsection