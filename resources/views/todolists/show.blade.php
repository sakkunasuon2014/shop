@extends('layout.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">To-do Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/todolists') }}">To-Do Lists</a></li>
            <li class="breadcrumb-item active">{{ $todolists->title }}</li>
        </ol>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            {{ $todolists->title }}
                            @if($todolists->status == 'completed')
                            <span class="badge bg-success ms-2">Completed</span>
                            @else
                            <span class="badge bg-warning ms-2">Pending</span>
                            @endif
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Category:</strong>
                            </div>
                            <div class="col-sm-9">
                                @if($todolists->category)
                                <span class="badge bg-secondary">{{ $todolists->category->title }}</span>
                                @else
                                <span class="text-muted">No Category Assigned</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Status:</strong>
                            </div>
                            <div class="col-sm-9">
                                @if($todolists->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                                @else
                                <span class="badge bg-warning">Pending</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Description:</strong>
                            </div>
                            <div class="col-sm-9">
                                <p class="mb-0">{{ $todolists->description }}</p>
                            </div>
                        </div>

                        @if($todolists->created_at)
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Created:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $todolists->created_at->format('M d, Y \a\t g:i A') }}
                            </div>
                        </div>
                        @endif

                        @if($todolists->updated_at && $todolists->updated_at != $todolists->created_at)
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Last Updated:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $todolists->updated_at->format('M d, Y \a\t g:i A') }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="{{ url('/todolists/' . $todolists->id . '/edit') }}">
                                <i class="fas fa-edit"></i> Edit This To-Do
                            </a>

                            @if($todolists->status == 'pending')
                            {!! Form::open(['url' => '/todolists/' . $todolists->id, 'method' => 'PUT']) !!}
                            {!! Form::hidden('title', $todolists->title) !!}
                            {!! Form::hidden('description', $todolists->description) !!}
                            {!! Form::hidden('category_id', $todolists->category_id) !!}
                            {!! Form::hidden('status', 'completed') !!}
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check"></i> Mark as Completed
                            </button>
                            {!! Form::close() !!}
                            @endif

                            {!! Form::open(['url' => 'todolists/' . $todolists->id, 'method' => 'DELETE']) !!}
                            <button type="button" class="btn btn-danger delete-item">
                                <i class="fas fa-trash"></i> Delete This To-Do
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <a class="btn btn-secondary" href="{{ url('/todolists') }}">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
</main>

@push('scripts')
<script>
    $(document).ready(function() {
        $(".delete-item").click(function(e) {
            e.preventDefault();
            const form = $(this).closest('form');

            if (confirm('Are you sure you want to delete this to-do item? This action cannot be undone.')) {
                form.submit();
            }
        });
    });
</script>
@endpush
@endsection