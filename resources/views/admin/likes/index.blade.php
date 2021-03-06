@extends('admin.dashboard')


@section('content')

<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <span class="pull-right">
               <h4>
                <a href="{{ route('users.create') }}">Create New User</a>
                </h4>
            </span>
            <h4 class="title">Likes List</h4>
            <p class="category">All Users Likes</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Reply Id</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                   @if(isset($likes))
                       @foreach($likes->all() as $like)
                    <tr>
                        <td>{{ $like->id }}</td>
                        <td>{{ $like->user_id }}</td>
                        <td>{{ $like->reply_id }}</td>
                        <td><a href="{{ route('likes.edit', ['id' => $like->id]) }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('likes.destroy', ['id' => $like->id]) }}" method="post">
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