@extends('admin.dashboard')


@section('content')


<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h4 class="title">Edit Discussion</h4>
            <p class="category">You can edit discussion here</p>
        </div>
        <div class="card-content table-responsive">
            
            @include('admin.partials.includes')
            
            <form action="{{ route('discussions.update', ['id' => $discussion->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                
                
                <div class="form-group">
                    <label for="">Active</label>
                    <select name="is_active" class="form-control">
                        <option value="">Choose</option>
                        <option value="0">Active</option>
                        <option value="1">Disactive</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Channel</label>
                    <select name="channel_id" class="form-control">
                        <option value="">Choose</option>
                        @foreach($channels->all() as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                        @endforeach
                    </select>
                </div>
                
                
                <div class="form-group">
                    <label for="">title</label>
                    <input type="text" name="title" value="{{ $discussion->title }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea name="body" rows="10" class="form-control">{{ $discussion->body }}</textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
                
            </form>
            
        </div>
    </div>
</div>

@endsection