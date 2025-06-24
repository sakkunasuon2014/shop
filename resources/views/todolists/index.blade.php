@extends('layout.backend')

@section('content')
<h1>To-Do List</h1>
<a class="btn btn-primary" href="{{ url('/todolists/create') }}">New</a>
<br><br>

@if(Session::has('todolist_delete'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {!! session('todolist_delete') !!}
</div>
@endif

@if (count($todolists) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        All To-Do Items
    </div>

    <div class="panel-body">
        <table id="myTable" class="table table-striped task-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($todolists as $todo)
                <tr>
                    <td>
                        <a href="{{ url('/todolists/'.$todo->id) }}">{{ $todo->title }}</a>
                    </td>
                    <td>
                        {!! $todo->description !!}
                    </td>
                    <td>
                        {{ ucfirst($todo->status) }}
                    </td>
                    <td>
                        {{ $todo->category->name ?? 'N/A' }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('todolists/' . $todo->id . '/edit') }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('todolists/' . $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    new DataTable('#myTable');
    $(".delete").click(function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        $('<div></div>').appendTo('body')
            .html('<div><h6> Are you sure you want to delete this item?</h6></div>')
            .dialog({
                modal: true,
                title: 'Delete Confirmation',
                zIndex: 10000,
                autoOpen: true,
                width: 'auto',
                resizable: false,
                buttons: {
                    Yes: function() {
                        $(this).dialog('close');
                        form.submit();
                    },
                    No: function() {
                        $(this).dialog("close");
                        return false;
                    }
                },
                close: function(event, ui) {
                    $(this).remove();
                }
            });
    });
</script>
@endif

@endsection