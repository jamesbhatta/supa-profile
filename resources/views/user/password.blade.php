@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-2">
            <div>
                @include('alerts.all')
            </div>
            @hasanyrole('super-admin|admin')
            <div class="gery lighten-5 py-4">
                <a href="{{ route('user.index') }}"><i class="fa fa-arrow-left mr-2"></i>Back to users</a>
            </div>
            @endhasanyrole
            <div class="card z-depth-0">
                <div class="card-body">
                    <h2 class="h2-responsive">Change Password</h2>
                    <form action="{{ route('password.change', $user) }}" method="POST" class="form">
                        @csrf
                        @method('put')
                        @hasanyrole('super-admin|admin')
                        @else
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="password" class="form-control" autofocus>
                        </div>
                        @endhasanyrole
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block z-depth-0">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
