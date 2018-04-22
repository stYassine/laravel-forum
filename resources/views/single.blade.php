@extends('layouts.app')

@section('content')

        <div class="col-md-12">
           
           @if(isset($discussion))
            <div class="panel panel-default">
                <div class="panel-heading">
                  <span class="pull-right">{{ $discussion->channel->title }}</span>
                   <img src="{{ asset($discussion->user->avatar) }}" style="width:40px;">
                </div>

                <div class="panel-body">
                    <h3>{{ $discussion->title }}</h3>
                    <p>{{ $discussion->body }}</p>
                </div>
                <div class="panel-footer">
                    <a href="#" class="btn btn-info">Watch</a>
                    <a href="#" class="btn btn-danger">UnWatch</a>
                </div>
            </div>
            @endif
            
            
            <!-- Create New Reply -->
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Create New Comment</h4>
                </div>

                <div class="panel-body">

                    <form action="{{ route('reply') }}" method="post">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="5" placeholder="Comment...">

                            </textarea>
                        </div>



                </div>
                <div class="panel-footer">

                    <div class="form-group">
                            <button class="btn btn-success">Create</button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- END Create New Reply -->
            
            
            
            <!-- All Comments -->
            @if(count($discussion->replies) > 0)
                @foreach($discussion->replies as $key => $reply)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{ asset($reply->user->avatar) }}" style="width:40px;">
                    {{ $reply->user->name }}
                </div>
                <div class="panel-body">
                    <p>{{ $reply->body }}</p>
                </div>
                <div class="panel-footer">
                    <a href="#" class="btn btn-info">Like  '0'</a>
                    <a href="#" class="btn btn-danger">UnLike</a>
                </div>
            </div>
                @endforeach
            @endif
            <!-- END All Comments -->
            
            
            
            
        </div>
        
    
@endsection
