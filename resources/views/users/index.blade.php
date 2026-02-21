@extends('layouts.app')

@section('title','Users List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Users List</h2>

    <a href="{{ route('users.create') }}" class="btn btn-primary">
        + Create User
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <table class="table table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>

            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>
                        @if($user->profile_pic)
                            <img src="{{ asset('storage/'.$user->profile_pic) }}"
                                 class="rounded-circle border"
                                 width="60"
                                 height="60"
                                 style="object-fit:cover;">
                        @else
                            <span class="badge bg-secondary">No Image</span>
                        @endif
                    </td>

                    <td class="fw-semibold">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>

                    <td>
                        <a href="{{ route('users.edit',$user->id) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-muted py-4">
                        No users found.
                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>

    </div>
</div>

@endsection