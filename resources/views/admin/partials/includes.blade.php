@if(count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops Something Went Wrong</strong>
        <ul>
            @foreach($errors as $key => $error)
                <li>{{ $key.' '.$error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Users -->
@if(Session::has('user_created'))
    <div class="alert alert-success">
       {{ Session::get('user_created') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif
@if(Session::has('user_updated'))
    <div class="alert alert-info">
       {{ Session::get('user_updated') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif
@if(Session::has('user_deleted'))
    <div class="alert alert-danger">
       {{ Session::get('user_deleted') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif




<!-- Channels -->
@if(Session::has('channel_created'))
    <div class="alert alert-success">
       {{ Session::get('channel_created') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif
@if(Session::has('channel_updated'))
    <div class="alert alert-info">
       {{ Session::get('channel_updated') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif
@if(Session::has('channel_deleted'))
    <div class="alert alert-danger">
       {{ Session::get('channel_deleted') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif




<!-- Discussions -->
@if(Session::has('discussion_created'))
    <div class="alert alert-success">
       {{ Session::get('discussion_created') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif
@if(Session::has('discussion_updated'))
    <div class="alert alert-info">
       {{ Session::get('discussion_updated') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif
@if(Session::has('discussion_deleted'))
    <div class="alert alert-danger">
       {{ Session::get('discussion_deleted') }}
        <span class="close" data-dismiss="alert"></span>
    </div>
@endif