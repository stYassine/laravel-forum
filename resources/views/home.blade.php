@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">
                   
                   <div class="row">
                   
                   <div class="col-md-6">
                   
                    <img src="{{ asset(Auth::user()->avatar) }}" style="width:60px;">
                    {{ Auth::user()->name }}
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                    <form action="{{ route('avatar.upload') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" name="avatar">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-xs">Upload</button>
                        </div>
                        
                    </form>
                    
                    </div>
                    
                    </div>
                </div>

                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <p>Email: {{ Auth::user()->email }}</p>
                            <p>Discussions: {{ Auth::user()->discussions()->count() }} <a class="pull-right" href="{{ route('profile.discussions', ['id' => Auth::id()]) }}">View All Discussions</a></p>
                            <p>Replies: {{ Auth::user()->replies()->count() }} <a class="pull-right" href="{{ route('profile.likes', ['id' => Auth::id()]) }}">View All Replies</a></p>
                            <p>Likes: {{ Auth::user()->likes()->count() }} <a class="pull-right" href="{{ route('profile.replies', ['id' => Auth::id()]) }}">View All Liked Replies</a></p>
                        </li>
                    </ul>
                
            </div>
            <div class="panel-footer">
                
            </div>
            </div>


@endsection
