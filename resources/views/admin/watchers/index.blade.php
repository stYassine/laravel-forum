@extends('admin.dashboard')


@section('content')

<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <span class="pull-right">
               <h4>
                <a href="{{ route('users.create') }}">Create New Watcher</a>
                </h4>
            </span>
            <h4 class="title">Watchers List</h4>
            <p class="category">All Watchers</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>ID</th>
                    <th>User Id</th>
                    <th>Reply Id</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                   @if(isset($watchers))
                       @foreach($watchers->all() as $watcher)
                    <tr>
                        <td>{{ $watcher->id }}</td>
                        <td>{{ $watcher->user_id }}</td>
                        <td>{{ $watcher->discussion_id }}</td>
                        <td><a href="{{ route('watchers.edit', ['id' => $watcher->id]) }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('watchers.destroy', ['id' => $watcher->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection