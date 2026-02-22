@extends('layouts.app')

@section('title','Users List')

@section('content')


<div class="card shadow-lg border-0">

    {{-- Card Header --}}
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">

        <h4 class="mb-0 fw-bold text-dark">
            Users List
        </h4>

        <div class="d-flex gap-2">
            <a href="{{ route('users.export') }}" class="btn btn-success">
                Export CSV
            </a>

            <a href="{{ route('users.create') }}" class="btn btn-primary">
                + Create User
            </a>
        </div>

    </div>


    {{-- Table --}}
    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark text-center">
                    <tr>
                        <th width="60">ID</th>
                        <th width="90">Profile</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Email</th>
                        <th width="140">Mobile</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $user)
                    <tr class="text-center">

                        {{-- ID --}}
                        <td class="fw-semibold text-muted">
                            #{{ $user->id }}
                        </td>

                        {{-- Profile --}}
                        <td>
                            @if($user->profile_pic)
                            <img src="{{ asset('storage/'.$user->profile_pic) }}"
                                class="rounded-circle border shadow-sm"
                                width="50" height="50"
                                style="object-fit:cover;">
                            @else
                            <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width:50px;height:50px;">
                                N/A
                            </div>
                            @endif
                        </td>

                        {{-- Name --}}
                        <td class="text-start fw-semibold">
                            {{ $user->name }}
                        </td>

                        {{-- Email --}}
                        <td class="text-start text-muted">
                            {{ $user->email }}
                        </td>

                        {{-- Mobile --}}
                        <td>
                            <span class="badge bg-light text-dark border px-3 py-2">
                                {{ $user->mobile }}
                            </span>
                        </td>

                        {{-- Actions --}}
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
                                <h5 class="fw-bold">No Users Found</h5>
                                <p>Create your first user to get started.</p>

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