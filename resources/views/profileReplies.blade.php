@extends('layouts.app')

@section('content')

    <div class="col-md-12">
       
       

           @if(isset($replies))
               
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ $user->name }} Replies</h4>
                    </div>

                    <div class="panel-body">
                       <ul class="list-group">
                        @foreach($replies->all() as $reply)
                            <li class="list-group-item">{{ substr($reply->body, 0, 50).'...' }}
                                <a href="{{ route('single', ['id' => $reply->discussion->slug ]) }}">View Discussion</a>
                            </li>
                        @endforeach
                        </ul>
                    </div>

                    <div class="panel-footer">
                        
                    </div>
                </div>
                
            @endif

    </div>
        
   
@endsection
