@extends('layouts.app')

@section('content')

    <div class="col-md-12">
       
       <h4>{{ $user->name }} Discussions</h4>

           @if(isset($discussions))
               @foreach($discussions->all() as $discussion)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $discussion->title }}
                </div>

                <div class="panel-body">
                    <p>{{ substr($discussion->body, 0, 150).'...' }}</p>
                </div>

                <div class="panel-footer">
                    <span>{{ $discussion->replies->count() }} Replies</span>
                    <span class="pull-right"><a href="{{ route('single', ['slug' => $discussion->slug]) }}">View</a></span>
                </div>
            </div>
                @endforeach
            @endif

    </div>
        
   
@endsection
