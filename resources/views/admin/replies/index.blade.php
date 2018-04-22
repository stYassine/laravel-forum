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
            <h4 class="title">Replies List</h4>
            <p class="category">All Replies Likes</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>ID</th>
                    <th>Reply User</th>
                    <th>discussion Id</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                   @if(isset($replies))
                       @foreach($replies->all() as $reply)
                    <tr>
                        <td>{{ $reply->id }}</td>
                        <td>{{ $reply->user->name }}</td>
                        <td>{{ $reply->discussion->id }}</td>
                        <td><a href="{{ route('replies.edit', ['id' => $reply->id]) }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('replies.destroy', ['id' => $reply->id]) }}" method="post">
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