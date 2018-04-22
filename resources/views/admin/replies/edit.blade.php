@extends('admin.dashboard')


@section('content')


<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h4 class="title">Edit Like</h4>
            <p class="category">You can edit like here</p>
        </div>
        <div class="card-content table-responsive">
            
            @include('admin.partials.includes')
            
            <form action="{{ route('likes.update', ['id' => $like->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                
                <div class="form-group">
                    <label for="">User</label>
                    <select name="name" class="form-control">
                        <option value="">Choose</option>
                        @foreach($users->all() as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Reply</label>
                    <select name="is_admin" class="form-control">
                        <option value="">Choose</option>
                        @foreach($replies->all() as $reply)
                            <option value="{{ $reply->id }}">{{ $reply->id }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
                
            </form>
            
        </div>
    </div>
</div>

@endsection