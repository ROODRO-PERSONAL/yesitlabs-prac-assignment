@extends('layouts.app')

@section('title','Edit User')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Edit User</h4>
    </div>

    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('users.update',$user->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name',$user->name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email',$user->email) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text"
                    name="mobile"
                    class="form-control"
                    value="{{ old('mobile',$user->mobile) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Current Image</label><br>

                @if($user->profile_pic)
                <img src="{{ asset('storage/'.$user->profile_pic) }}"
                    class="img-thumbnail"
                    width="120">
                @else
                <p class="text-muted">No image uploaded</p>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Change Image</label>
                <input type="file"
                    name="profile_pic"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    New Password
                    <small class="text-muted">(leave empty to keep old)</small>
                </label>

                <input type="password"
                    name="password"
                    class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('users.index') }}"
                    class="btn btn-secondary">
                    Back
                </a>

                <button class="btn btn-success">
                    Update User
                </button>
            </div>

        </form>
    </div>
</div>

@endsection