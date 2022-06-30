@extends('layouts.app')

@section('content')
<div class="font-noto">
    <div class="container-fluid">
        <div class="card z-depth-0">
            <div class="card-body">
                <div class="d-flex">
                    <div class="align-self-center h2-responsive mdb-color-text font-weight-bold">Users</div>
                    <div class="ml-auto">
                        <a class="btn btn-primary btn-md z-depth-0" href="{{ route('user.create') }}"><span class="mr-2"><i class="fa fa-plus"></i></span> New User</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-5"></div>

        <div class="card z-depth-0">
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr class="text-uppercase">
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            {{-- <th>Municipality</th> --}}
                            {{-- <th>Ward</th> --}}
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->municipality_id)
                                {{-- {{ $user->municipality->name }} <span class="small text-muted">(ID: {{ $user->municipality_id }})</span> --}}
                                @endif
                            </td>
                            <td>
                                @if($user->ward_id)
                                {{-- {{ $user->ward->name }} <span class="small text-muted">(ID: {{ $user->ward_id }})</span> --}}
                                @else
                                <span class="small text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @foreach ($user->getRoleNames() as $role)
                                <span class="py-1 px-2 d-inline-block shadow-none text-left rounded text-capitalize" style="background-color: #f2f7fb; font-size: 13px; min-width: 110px;">{{ str_replace('-', ' ', $role) }}</span> @if (!$loop->last) | @endif
                                @endforeach
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('password.change.form', $user) }}" class="action-btn text-primary"><i class="fas fa-key"></i></a>
                                <span class="mx-2">|</span>
                                <a href="{{ route('user.edit', $user) }}" class="action-btn text-primary"><i class="fa fa-edit"></i></a>
                                <span class="mx-2">|</span>
                                <form action="{{ route('user.destroy', $user) }}" method="post" onsubmit="return confirm('Are you sure to delete ?')" class="form-inline d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="42" class="text-center">** Users does not exist **</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
