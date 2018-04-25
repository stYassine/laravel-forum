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
                    @if(Auth::check())
                        @if($discussion->is_watched_by_auth())
                            <a href="{{ route('watch', ['id' => $discussion->id]) }}" class="btn btn-danger btn-xs">UnWatch</a>
                        @else
                            <a href="{{ route('unwatch', ['id' => $discussion->id]) }}" class="btn btn-info btn-xs">Watch</a>
                        @endif
                    @endif
                </div>
            </div>
            @endif
            
            
            <!-- Create New Reply -->
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Create New Comment</h4>
                </div>
                
                
                <div class="panel-body">

                    @if(Auth::check())
                    
                    <form action="{{ route('reply') }}" method="post">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                        
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="5" placeholder="Comment..."></textarea>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>

                    </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endif    

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
                        @if(Auth::check())
                            <a href="{{ route('reply.like', ['id' => $reply->id]) }}" class="btn btn-info btn-xs">Like '0'</a>
                            <a href="{{ route('reply.unlike', ['id' => $reply->id]) }}" class="btn btn-danger btn-xs">UnLike</a>
                        @endif
                    </div>
                </div>
                @endforeach
            @endif
            <!-- END All Comments -->
            
            
            
            
        </div>
        
    
@endsection
