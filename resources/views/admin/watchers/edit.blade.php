@extends('admin.dashboard')


@section('content')


<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h4 class="title">Create New User</h4>
            <p class="category">You can create new user here</p>
        </div>
        <div class="card-content table-responsive">
            
            @include('admin.partials.includes')
            
            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="">Active</label>
                    <select name="is_active" value="{{ $user->is_active }}" class="form-control">
                        <option value="">Choose</option>
                        <option value="0">Active</option>
                        <option value="1">Disactive</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="is_admin" value="{{ $user->is_admin }}" class="form-control">
                        <option value="">Choose</option>
                        <option value="0">Admin</option>
                        <option value="1">Subscriber</option>
                    </select>
                </div>
                
                
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>
                
                
                <div class="form-group">
                    <label for="">Avatar</label>
                    <img src="{{ asset($user->avatar) }}" width="80px">
                </div>
                
                <div class="form-group">
                    <label for="">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </form>
            
        </div>
    </div>
</div>

@endsection