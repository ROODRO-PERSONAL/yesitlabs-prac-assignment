@extends('layouts.app')

@section('title','Users List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-0">Users List</h2>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm">
        + Create User
    </a>
</div>

<div class="card border-0 shadow-lg">
    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Profile</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Email</th>
                        <th>Mobile</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $user)
                    <tr class="text-center">

                        <td class="fw-semibold text-muted">
                            #{{ $user->id }}
                        </td>

                        <td>
                            @if($user->profile_pic)
                            <img src="{{ asset('storage/'.$user->profile_pic) }}"
                                class="rounded-circle border shadow-sm"
                                width="55"
                                height="55"
                                style="object-fit:cover;">
                            @else
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width:55px;height:55px;">
                                N/A
                            </div>
                            @endif
                        </td>

                        <td class="text-start fw-semibold">
                            {{ $user->name }}
                        </td>

                        <td class="text-start text-muted">
                            {{ $user->email }}
                        </td>

                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $user->mobile }}
                            </span>
                        </td>

                        <td>

                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('users.edit',$user->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy',$user->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this user?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">

                            <div class="text-muted">
                                <h5>No Users Found</h5>
                                <p class="mb-3">Start by creating your first user.</p>

                                <a href="{{ route('users.create') }}"
                                    class="btn btn-primary">
                                    Create User
                                </a>
                            </div>

                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</div>

@endsection