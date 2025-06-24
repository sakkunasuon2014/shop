@extends('layout.backend')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit To-do List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/todolists">View all To-do List</a></li>
            <li class="breadcrumb-item active"><a href="todolists/create">Create post</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('todolists_update'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('todolists_update') !!}
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
                {{ Html::modelForm($todolists ,'PUT', route('todolists.update', $todolists->id))->acceptsFiles()->open() }}
                {!! Html::label('Category:','category_id') !!}
                {!! Html::select('category_id', $categories, $todolists->category_id)->class('form-control') !!}
                <br>
                {!! Html::label('Title:','title') !!}
                {!! Html::input('text','title', $todolists->title)->class('form-control') !!}
                <br>
                {!! Html::label('Description:','description') !!}
                {!! Html::textarea('description', $todolists->description)->class('form-control') !!}
                <br>
                {!! Html::label('Status:','status') !!}
                {!! Html::select('status', ['pending' => 'Pending', 'completed' => 'Completed'], $todolists->status)->class('form-control') !!}
                <br>
                {{ Html::submit('Update')->class('btn btn-primary') }}
                <a class="btn btn-primary" href="{!! url('/todolists')!!}">Back</a>
                {!! Html::closeModelForm() !!}
            </div>
        </div>
    </div>
</main>
@endsection