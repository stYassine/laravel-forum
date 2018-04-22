@extends('admin.dashboard')


@section('content')

<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <span class="pull-right">
               <h4>
                <a href="{{ route('channels.create') }}">Create New Channel</a>
                </h4>
            </span>
            <h4 class="title">Channels List</h4>
            <p class="category"></p>
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
                   @if(isset($channels))
                       @foreach($channels->all() as $channel)
                    <tr>
                        <td>{{ $channel->id }}</td>
                        <td>{{ $channel->title }}</td>
                        <td><a href="{{ route('channels.edit', ['id' => $channel->id]) }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('channels.destroy', ['id' => $channel->id]) }}" method="post">
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