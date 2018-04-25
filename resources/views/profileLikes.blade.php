@extends('layouts.app')

@section('content')

    <div class="col-md-12">
       
       

           @if(isset($likes))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ $user->name }} Likes</h4>
                    </div>

                    <div class="panel-body">
                        <ul class="list-group">
                           @foreach($likes->all() as $like)
                                <li class="list-group-item">{{ substr($like->reply->body, 0, 50).'...' }}<a href="{{ route('single', ['id' => $like->reply->discussion->slug]) }}">View</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="panel-footer">
                    </div>
                </div>
            @endif

    </div>
        
   
@endsection
