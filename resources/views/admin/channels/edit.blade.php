@extends('admin.dashboard')


@section('content')


<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h4 class="title">Update Channel</h4>
            <p class="category">You can update channel here</p>
        </div>
        <div class="card-content table-responsive">
            
            @include('admin.partials.includes')
            
            <form action="{{ route('channels.update', ['id' => $channel->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{ $channel->title }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
                
            </form>
            
        </div>
    </div>
</div>

@endsection