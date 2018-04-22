@extends('admin.dashboard')


@section('content')


<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h4 class="title">Create New Watcher</h4>
            <p class="category">You can create new watcher here</p>
        </div>
        <div class="card-content table-responsive">
            
            @include('admin.partials.includes')
            
            <form action="{{ route('watchers.store') }}" method="post">
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
                    <label for="">Discussion</label>
                    <select name="is_admin" class="form-control">
                        <option value="">Choose</option>
                        @foreach($discussions->all() as $discussion)
                            <option value="{{ $discussion->id }}">{{ $discussion->id }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                
            </form>
            
        </div>
    </div>
</div>

@endsection