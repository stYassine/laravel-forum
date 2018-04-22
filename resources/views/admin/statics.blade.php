@extends('admin.dashboard')


@section('content')

<div class="row">
    
    <!-- Users Number Card -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">content_copy</i>
            </div>
            <div class="card-content">
                <p class="category">Users</p>
                <h3 class="title">{{ $num_users }}
                    <small></small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">View All Users</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Users Number Card -->
    
    <!-- channels Number Card -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">content_copy</i>
            </div>
            <div class="card-content">
                <p class="category">Channels</p>
                <h3 class="title">{{ $num_channels }}
                    <small></small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">View All Channels</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END channels Number Card -->
    
    <!-- Users discussions Card -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="purple">
                <i class="material-icons">content_copy</i>
            </div>
            <div class="card-content">
                <p class="category">Discussions</p>
                <h3 class="title">{{ $num_discussions }}
                    <small></small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">View All Discussions</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END discussions Number Card -->
    
    <!-- Users Number Card -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="pink">
                <i class="material-icons">content_copy</i>
            </div>
            <div class="card-content">
                <p class="category">Replies</p>
                <h3 class="title">{{ $num_replies }}
                    <small></small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">View All Replies</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Users Number Card -->
    
    
    <!-- Users Likes Card -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">content_copy</i>
            </div>
            <div class="card-content">
                <p class="category">Likes</p>
                <h3 class="title">{{ $num_likes }}
                    <small></small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">View All Likes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Likes Number Card -->
    
    
    <!-- Users Likes Card -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">content_copy</i>
            </div>
            <div class="card-content">
                <p class="category">Watchers</p>
                <h3 class="title">{{ $num_watchers }}
                    <small></small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">View All Watchers</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Likes Number Card -->



    
</div>


@endsection