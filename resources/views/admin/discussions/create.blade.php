@extends('admin.dashboard')


@section('content')


<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h4 class="title">Create New Discussion</h4>
            <p class="category">You can create new discussion here</p>
        </div>
        <div class="card-content table-responsive">
            
            @include('admin.partials.includes')
            
            <form action="{{ route('discussions.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                
                
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                
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
                    <input type="text" name="title" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea name="body" rows="10" class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                
            </form>
            
        </div>
    </div>
</div>

@endsection