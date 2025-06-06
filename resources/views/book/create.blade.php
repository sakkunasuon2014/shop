@extends('layout.backend')

@section('content')
    <h1>Create Book</h1>
    @if(Session::has('book_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('book_create') !!}
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
    {!! Html::form('POST','/book')->open() !!}
    {!! Html::label('Title: ','title') !!}
    {!! Html::input('text','title', '')->class('form-control')  !!}
    <br>
    {!! Html::label('Description: ','description') !!}
    {!! Html::textarea('description', '')->class('form-control') !!}
    <br>
    <br>
    {!! Html::label('Author: ','author') !!}
    {!! Html::textarea('author', '')->class('form-control') !!}
    <br>
    <br>
    {!! Html::label('Year: ','year') !!}
    {!! Html::textarea('year', '')->class('form-control') !!}
    <br>
    {{ Html::submit('Create')->class('btn btn-primary') }}
    <a class="btn btn-secondary" href="{{route('book.index')}}">Back</a>
    {!! Html::form()->close() !!}
@endsection