@extends('admin.dashboard')


@section('content')

<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <span class="pull-right">
               <h4>
                <a href="{{ route('discussions.create') }}">Create New Discussion</a>
                </h4>
            </span>
            <h4 class="title">Discussions List</h4>
            <p class="category">All Discussions</p>
        </div>
        <div class="card-content table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </thead>
                <tbody>
                   @if(isset($discussions))
                       @foreach($discussions->all() as $discussion)
                    <tr>
                        <td>{{ $discussion->id }}</td>
                        <td>{{ $discussion->title }}</td>
                        <td><a href="{{ route('discussions.edit', ['id' => $discussion->id]) }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('discussions.destroy', ['id' => $discussion->id]) }}" method="post">
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