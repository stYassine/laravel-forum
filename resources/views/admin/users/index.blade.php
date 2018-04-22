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
            <h4 class="title">Users List</h4>
            <p class="category">All Registerd Users</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                   @if(isset($users))
                       @foreach($users->all() as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td><img src="{{ asset($user->avatar) }}" style="width:80px;"></td>
                        <td><a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
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