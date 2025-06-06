@extends('layout.backend')

@section('content')
@if(Session::has('book_update'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Primary!</strong> {!! session('book_update') !!}
</div>
@endif
@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
    <strong>Something is Wrong</strong>
    <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{!! $error !!}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('book.update', $book->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}">
    </div>
    <br>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $book->description) }}</textarea>
    </div>
    <br>

    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author) }}">
    </div>
    <br>

    <div class="form-group">
        <label for="year">Year:</label>
        <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $book->year) }}">
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Update</button>
    <a class="btn btn-secondary" href="{{ route('book.index') }}">Back</a>
</form>
@endsection