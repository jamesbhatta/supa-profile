@extends('layouts.app')

@section('content')
<div class="container">
    <div class="font-roboto">
        <div class="text-center">
            <h2 class="h2-responsive font-weight-bold">{{ $user->exists ? 'Edit' : 'Add New' }} User</h2>
        </div>

        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card border">
                    <div class="card-body">

                        <div class="my-3">
                            @include('alerts.all')
                        </div>

                        <form action="{{ isset($user->id) ? route('user.update', $user) : route('user.store') }}" method="post" class="form">
                            @csrf
                            @isset($user->id)
                            @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" @isset($user->id) readonly @endisset>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}">
                            </div>
                            <div class="form-group">
                                <label>Roles</label>
                                {{--
                                <select name="role" id="" class="form-control">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" @if(old('role', $user->getRoleNames()->first()) == $role->name) selected @endif>{{ $role->name }}</option>
                                @endforeach
                                </select>
                                --}}
                                @foreach($roles as $role)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="roles[]" class="custom-control-input" id="role-checkbox-{{ $role->name }}" value="{{ $role->name }}" @if($user->hasRole($role->name)) checked @endif>
                                    <label class="custom-control-label" for="role-checkbox-{{ $role->name }}">{{ ucfirst($role->name) }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Municipality</label>
                                <select name="municipality_id" id="" class="custom-select">
                                    @foreach ($municipalities as $municipality)
                                    <option value="{{ $municipality->id }}" @if(old('municipality_id', $user->municipality_id) == $municipality->id) selected @endif>{{ $municipality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="is_ward_login" id="ward-toggler" @if(($user->id && isset($user->ward_id))) checked @endif>
                                    <label class="custom-control-label" for="ward-toggler">Ward Login</label>
                                    <small class="form-text text-muted">
                                        Check this field for ward employees and make sure to select the ward from dropdown below.
                                    </small>
                                </div>
                            </div>
                            <div class="form-group @if($user->id && !isset($user->ward_id)) d-none @endif;" id="ward-selector">
                                <label>Ward</label>
                                <select name="ward_id" class="custom-select">
                                    <option value="">Select Ward</option>
                                    @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}" @if(old('ward_id', $user->ward_id) == $ward->id) selected @endif>{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if($user->id == null)
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            @endisset

                            <div class="form-group">
                                @isset($user->id)
                                <button type="submit" class="btn btn-success btn-block z-depth-0">Update</button>
                                @else
                                <button type="submit" class="btn btn-success btn-block z-depth-0">Add</button>
                                @endisset
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End of user form --}}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#ward-toggler').change(function() {
            $('#ward-selector').toggleClass('d-none');;
        })
    })

</script>
@endpush
